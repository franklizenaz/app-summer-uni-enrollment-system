<?php

require_once __DIR__ . '/../core/Autoload.php';

class EnrollmentRepository
{
    public function enrollCourses(string $studentCode, array $courses): void
    {
        if (empty($courses)) {
            throw new InvalidArgumentException('No hay cursos para matricular');
        }

        $conn = Database::connection();

        try {
            // SQLite soporta BEGIN / COMMIT / ROLLBACK
            $conn->execute('BEGIN');

            $sql = "
                INSERT INTO enroll (student_code, course_code)
                VALUES (?, ?)
            ";

            foreach ($courses as $courseCode) {
                $conn->execute($sql, [
                    $studentCode,
                    $courseCode
                ]);
            }

            $conn->execute('COMMIT');

        } catch (Throwable $e) {
            $conn->execute('ROLLBACK');
            throw new RuntimeException(
                'Error al matricular cursos: ' . $e->getMessage(),
                0,
                $e
            );
        }
    }


    public function voidCourse(string $student, string $course): void
    {
        if (empty($course)) {
            throw new InvalidArgumentException('No hay cursos para anular');
        }

        $conn = Database::connection();

        try {
            // Iniciamos la transacción
            $conn->execute('BEGIN');

            // Borramos de enroll
            $sql = "
                DELETE FROM enroll WHERE student_code = ? AND course_code = ?
            ";

            $conn->execute($sql, [$student, $course]);

            // Confirmamos la transacción
            $conn->execute('COMMIT');

        } catch (Throwable $e) {
            $conn->execute('ROLLBACK');
            throw new RuntimeException(
                'Error al anular curso: ' . $e->getMessage(),
                0,
                $e
            );
        }
    }

}
