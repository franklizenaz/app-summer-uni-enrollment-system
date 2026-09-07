<?php 


require_once __DIR__ . '/../core/Autoload.php';

class DashboardRepository{

    public function getAtributeCoursesFromMultipleSchoolsByCycle(
        array $schools,
        string $atributeType,
        string $atributeValue,
        int $relativeCycle = 11,
        string $operator = "<="
    ): array {

        $mergedCourses = [];

        foreach ($schools as $schoolKey) {

            $repo = new CourseRepository($schoolKey);

            $coursesByCycle = $repo->getAtributeCourses(
                $atributeType,
                $atributeValue,
                $relativeCycle,
                $operator
            );

            foreach ($coursesByCycle as $cycle => $courses) {
                if (!isset($mergedCourses[$cycle])) {
                    $mergedCourses[$cycle] = [];
                }

                // merge sin perder objetos
                $mergedCourses[$cycle] = array_merge(
                    $mergedCourses[$cycle],
                    $courses
                );
            }
        }

        ksort($mergedCourses);

        return $mergedCourses;
    }

    public function getIndexCoursesFromMultipleSchools(
        array $schools,
        string $atributeType,
        string $atributeValue,
        int $relativeCycle = 11,
        string $operator = "<="
    ): array {

        $coursesFromMultipleSchoolsByCycle = $this->getAtributeCoursesFromMultipleSchoolsByCycle($schools, $atributeType, $atributeValue, $relativeCycle, $operator);

        $mergedCourses = [];

        foreach ($coursesFromMultipleSchoolsByCycle as $cycle => $courses) {
            foreach ($courses as $course) {

                if (!is_object($course)) {
                    continue; // defensa crítica
                }

                if (!method_exists($course, 'getCodigo')) {
                    continue;
                }

                $mergedCourses[$course->getEscuela()."-".$course->getCodigo()] = $course;
            }
        }


        return $mergedCourses;
    }


    public function countEnrollmentsByCycle(array $schools): array
    {
        $conn = Database::connection();

        $placeholders = implode(',', array_fill(0, count($schools), '?'));

        $sql = "
            SELECT 
                csh.cycle AS ciclo,
                COUNT(en.student_code) AS total
            FROM enroll en
            INNER JOIN course c
                ON c.code = en.course_code
            INNER JOIN student st
                ON st.code = en.student_code
            INNER JOIN school sc
                ON sc.code = st.school_code
            INNER JOIN course_school csh
                ON csh.course_code = c.code AND csh.school_code = sc.code
            WHERE sc.key_name IN ($placeholders)
            GROUP BY csh.cycle
            ORDER BY csh.cycle
        ";

        $rows = $conn->query($sql, $schools)->fetchArray();

        $result = [];

        foreach ($rows as $row) {
            $result[(int)$row['ciclo']] = (int)$row['total'];
        }

        return $result;
    }


}