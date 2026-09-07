<?php 


require_once __DIR__ . '/../core/Autoload.php';

class EnrollStudentsRepository{

    public function getStudentIndex(): array {

        $conn = Database::connection();

        $sql = "
                SELECT 
                    st.id,
                    us.code,
                    us.names,
                    us.lastnames,
                    us.email,
                    us.password_hash,
                    us.user_role,
                    us.user_status,
                    sc.key_name,
                    st.type_student,
                    st.approved_credits,
                    en.course_code
                FROM enroll en
                LEFT JOIN student st
                    ON st.code = en.student_code
                LEFT JOIN user us
                    ON us.code = st.code
                LEFT JOIN school sc
                    ON sc.code = st.school_code
            ";

        $rows = $conn->query($sql)->fetchArray();

        $students =[];

        foreach($rows as $row){
            $student = new EnrollStudent(
                                (int)$row['id'],
                                $row['code'],
                                $row['names'],
                                $row['lastnames'],
                                $row['email'],
                                $row['password_hash'],
                                $row['user_role'],
                                $row['user_status'],
                                $row['key_name'],
                                $row['type_student'],
                                (int)$row['approved_credits'],
                                $row['course_code']
            );

            $students[$row['code']."-".$row['course_code']] = $student;             
        };

        return $students;

    }

    public function countCoursesByStudent(string $studentCode): int
    {
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(*) as total 
                FROM enroll 
                WHERE student_code = ?
            ";
        $row = $conn->query($sql, [$studentCode])->fetchArray()[0];

        return (int)$row['total'];
    }

    public function enrolledCoursesByStudent(string $studentCode): array{
        $conn = Database::connection();

        $sql = "
                SELECT course_code 
                FROM enroll 
                WHERE student_code = ?
            ";
        $rows = $conn->query($sql, [$studentCode])->fetchArray();

        $courses = [];
        foreach($rows as $row){
            $courses[] = $row["course_code"];
        }

        return $courses;
    }

    public function verifyAlreadyEnrollOfIn(string $studentCode, string $courseCode): bool
    {
        $conn = Database::connection();

        $sql = "
                SELECT COUNT(*) as total 
                FROM enroll 
                WHERE student_code = ? AND course_code = ?
            ";
        $row = $conn->query($sql, [$studentCode, $courseCode])->fetchArray()[0];

        if((int)$row["total"] >= 1){
            return true;
        }

        return false;
        
    }

    public function enrolledStudentsByCourse(string $school, string $courseCode){
        $conn = Database::connection();

        $sql = "
                SELECT 
                    st.id,
                    st.code,
                    us.names,
                    us.lastnames,
                    us.email,
                    us.password_hash,
                    us.user_role,
                    us.user_status,
                    sc.key_name,
                    st.type_student,
                    st.approved_credits,
                    en.course_code
                FROM enroll en
                LEFT JOIN student st
                    ON st.code = en.student_code
                LEFT JOIN user us
                    ON us.code = st.code
                LEFT JOIN school sc
                    ON sc.code = st.school_code
                WHERE en.course_code = ? AND sc.key_name = ?
            ";
        $rows = $conn->query($sql, [$courseCode, $school])->fetchArray();

        $students = [];

        foreach($rows as $row){
            $student = new EnrollStudent(
                                (int)$row['id'],
                                $row['code'],
                                $row['names'],
                                $row['lastnames'],
                                $row['email'],
                                $row['password_hash'],
                                $row['user_role'],
                                $row['user_status'],
                                $row['key_name'],
                                $row['type_student'],
                                (int)$row['approved_credits'],
                                $row['course_code']
            );

            $students[$row["code"]] = $student;
        }

        return $students;
    }

}