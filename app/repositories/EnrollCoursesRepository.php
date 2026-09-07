<?php 


require_once __DIR__ . '/../core/Autoload.php';

class EnrollCoursesRepository{

    public function totalUniqueEnrollCourses(){
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(*) as total 
                FROM enrollment_course_school
                WHERE enroll_status = 'available'
            ";
        $row = $conn->query($sql)->fetchArray()[0];

        return (int)$row['total'];
    }

    public function countEstudentsByCourse(string $courseCode, string $school): int
    {
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(*) as total 
                FROM enroll en
                LEFT JOIN student st
                    ON st.code = en.student_code
                LEFT JOIN school sc
                    ON sc.code = st.school_code
                WHERE en.course_code = ? AND sc.key_name = ?
            ";
        $row = $conn->query($sql, [$courseCode,$school])->fetchArray()[0];

        return (int)$row['total'];
    }

    public function totalEnrolledStudents(){
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(*) as total 
                FROM enroll 
            ";
        $row = $conn->query($sql)->fetchArray()[0];

        return (int)$row['total'];
    }

    public function totalUniqueEnrolledStudents(){
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(DISTINCT student_code) as total 
                FROM enroll 
            ";
        $row = $conn->query($sql)->fetchArray()[0];

        return (int)$row['total'];
    }

    public function EnrollCourseByCode(string $school, string $courseCode){
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
                WHERE c.code = ? AND sc.key_name = ?
                GROUP BY
                    sc.key_name,  
                    c.code, c.name, c.credits,
                    cs.cycle, cs.type,
                    ecs.enroll_status, ecs.estimated_enrolled_students,
                    t.name, t.lastname, ecs.teacher_status
                ORDER BY c.code, sc.key_name
        ";

        $result = $conn->query($sql,[$courseCode, $school])->fetchArray()[0];

        $course = new EnrollCourse(
                        $result["key_name"],
                        $result["code"],
                        $result["name"],
                        $result["cycle"],
                        $result["credits"],
                        $result['prerequisites'],
                        [],
                        $result["type"],
                        $result["enroll_status"],
                        $result["estimated_enrolled_students"],
                        $result["pre_matriculados"],
                        $result["tname"] . " " . $result["tlastname"],
                        $result["tstatus"]
        );

        return $course;
    }

}