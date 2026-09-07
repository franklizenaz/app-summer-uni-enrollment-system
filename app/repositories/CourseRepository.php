<?php

require_once __DIR__ . '/../core/Autoload.php';

class CourseRepository {

    private string $school;
    private array $courseIndex;
    private array $courseIndexBySchool;
    private array $coursesByCycle;

    public function __construct(string $school) {
        $this->school = $school;
        $this->courseIndex = $this->courseIndex();
        $this->courseIndexBySchool = $this->courseIndexBySchool();
        $this->coursesByCycle = $this->getAllCoursesForEnrollment();
    }

    public function getCourseIndex(): array {
        return $this->courseIndex;
    }

    public function getCourseIndexbySchool(): array {
        return $this->courseIndexBySchool;
    }

    public function getAllCourses(): array {
        return $this->coursesByCycle;
    }

    public function getAtributeCourses(string $atributeType, string $atributeValue, int $relativeCycle = 11, string $operator = "<="): array {

        $atributeCouses = [];
        $method = "get" . ucfirst($atributeType);

        foreach ($this->coursesByCycle as $cycle => $cycleJoint) {
            foreach ($cycleJoint as $course) {

                if (!is_object($course)) {
                    continue; // descarta basura
                }

                if (!method_exists($course, $method)) {
                    continue;
                }

                $comparacion = match ($operator) {
                    '>=' => $cycle >= $relativeCycle,
                    '<=' => $cycle <= $relativeCycle,
                    '>'  => $cycle >  $relativeCycle,
                    '<'  => $cycle <  $relativeCycle,
                    '==' => $cycle == $relativeCycle,
                    default => false,
                };

                if ($comparacion) {
                    if ($course->$method() === $atributeValue){
                    $atributeCouses[$cycle][] = $course;
                    }
                }
            }
        }

        ksort($atributeCouses);
        return $atributeCouses;
    }

    private function courseIndex(): array {
        $conn = Database::connection();

        $sql = "
                SELECT
                    sc.key_name,             
                    cs.cycle,
                    c.code,
                    c.name,
                    c.credits,
                    cs.type,
                    ecs.enroll_status,
                    ecs.estimated_enrolled_students,
                    ecs.pre_matriculados,
                    COALESCE(GROUP_CONCAT(cp.prerequisite_code), '') AS prerequisites,
                    t.name as tname,
                    t.lastname as tlastname,
                    ecs.teacher_status as tstatus
                FROM course c
                INNER JOIN course_school cs
                    ON c.code = cs.course_code
                INNER JOIN school sc
                    ON sc.code = cs.school_code
                LEFT JOIN enrollment_course_school ecs
                    ON ecs.course_school_id = cs.id
                LEFT JOIN teacher t
                    ON t.code = ecs.teacher_code
                LEFT JOIN (
                    SELECT cp.course_code, cp.prerequisite_code, pcs.school_code
                    FROM prerequisite_course cp
                    LEFT JOIN prerequisite_course_school pcs
                        ON pcs.prerequisite_course_id = cp.id
                ) AS cp
                    ON c.code = cp.course_code
                    AND (cp.school_code = sc.code OR cp.school_code IS NULL)
                GROUP BY
                    sc.key_name,  
                    c.code, c.name, c.credits,
                    cs.cycle, cs.type,
                    ecs.enroll_status, ecs.estimated_enrolled_students,
                    t.name, t.lastname, ecs.teacher_status
                ORDER BY c.code, sc.key_name
        ";

        $result = $conn->query($sql)->fetchArray() ?? [];
        
        /**
         * Índice de cursos por código
         * code => fila completa
         */
        $index = [];

        foreach ($result as $row) {
            $course = new EnrollCourse(
                            $row["key_name"],
                            $row["code"],
                            $row["name"],
                            $row["cycle"],
                            $row["credits"],
                            $row['prerequisites'],
                            [],
                            $row["type"],
                            $row["enroll_status"],
                            $row["estimated_enrolled_students"],
                            $row["pre_matriculados"],
                            $row["tname"] . " " . $row["tlastname"],
                            $row["tstatus"]
            );
            $index[$row['key_name']."-".$row["code"]] = $course;
        }

        return $index;
    }

    private function courseIndexBySchool(): array {
        
        $index = [];

        foreach ($this->getCourseIndex() as $code => $course) {
            if($course->getEscuela() === $this->school){
                $index[$course->getCodigo()] = $course;
            }
        }

        return $index;
    }

    private function getPrerequisites(string $prereqString, array $courseIndex): array {

        if (trim($prereqString) === '') {
            return [];
        }

        $codes = array_map('trim', explode(',', $prereqString));
        $resolved = [];

        foreach ($codes as $code) {

            if (!isset($courseIndex[$code])) {
                continue; // integridad referencial defensiva
            }

            $course = $courseIndex[$code];

            $resolved[] = [
                'codigo'   => $course->getCodigo(),
                'nombre'   => $course->getNombre(),
                'ciclo'    => (int) $course->getCiclo(),
                'creditos' => (int) $course->getCreditos(),
                'tipo'     => $course->getTipo(),
            ];
        }

        return $resolved;
    }
    public function getAllCoursesForEnrollment(): array {

        $index = $this->courseIndexBySchool;

        foreach ($index as $code => $course) {
            $course->setArrayPrerequisitos($this->getPrerequisites($course->getPrerequisitos(), $index));
        }

        $enrollCoursesByCycle = [];

        foreach ($index as $code => $course) {
            $cycle = $course->getCiclo();
            $enrollCoursesByCycle[$cycle][] = $course;
        }

        ksort($enrollCoursesByCycle); // ciclos 1 → 10


        return $enrollCoursesByCycle;
    }

    public function getEnrolledCourses(string $studentCode): array {

        $conn = Database::connection();

        $sql = "
            SELECT course_code FROM enroll WHERE student_code = ?
        ";

        $enrolls = $conn->query($sql, [$studentCode])->fetchArray() ?? [];

        $enroll_courses = [];
        foreach ($enrolls as $row) {

            $course = new EnrollCourse ($this->courseIndexBySchool[$row['course_code']]->getEscuela(),
                                    $this->courseIndexBySchool[$row['course_code']]->getCodigo(),
                                    $this->courseIndexBySchool[$row['course_code']]->getNombre(),
                                    $this->courseIndexBySchool[$row['course_code']]->getCiclo(),
                                    $this->courseIndexBySchool[$row['course_code']]->getCreditos(),
                                    $this->courseIndexBySchool[$row['course_code']]->getPrerequisitos(),
                                    $this->getPrerequisites($this->courseIndexBySchool[$row['course_code']]->getPrerequisitos(),$this->courseIndexBySchool),
                                    $this->courseIndexBySchool[$row['course_code']]->getTipo(),
                                    $this->courseIndexBySchool[$row['course_code']]->getEstado(),
                                    $this->courseIndexBySchool[$row['course_code']]->getCantidadEstimadaAlumnos(),
                                    $this->courseIndexBySchool[$row["course_code"]]->getPrematriculados(),
                                    $this->courseIndexBySchool[$row["course_code"]]->getNombreProfesor(),
                                    $this->courseIndexBySchool[$row["course_code"]]->getEstadoProfesor(),
                                    );
            $enroll_courses[] = $course;
                                }

        return $enroll_courses;
    }

}
