<?php

require_once __DIR__ . '/../core/Autoload.php';

class UserRepository {

    public static function findByEmail(string $email) {

        $conn = Database::connection();

        $sql = "SELECT *
                FROM user
                WHERE email = ?
                LIMIT 1";

        $rows = $conn->query($sql, [$email])->fetchArray();
        $row = $rows[0];

        if (!$row) {
            return null;
        }

        return self::mapToUser($row);
    }

    private static function mapToUser(array $row) {

        switch ($row['user_role']) {
            case 'estudiante':
                $conn = Database::connection();
                $sql = "SELECT 
                            s.code,
                            sc.key_name,
                            s.type_student,
                            s.approved_credits
                        FROM student s
                        LEFT JOIN school sc
                        ON s.school_code = sc.code
                        WHERE s.code = ?
                        LIMIT 1";
                $rowsToMap = $conn->query($sql, [$row['code']])->fetchArray();
                if (empty($rowsToMap)) {
                    return null; // No hay datos de estudiante
                }
                $rowToMap = $rowsToMap[0];

                try {
                    return new Student(
                        (int)$row['id'],
                        $row['code'],
                        $row['names'],
                        $row['lastnames'],
                        $row['email'],
                        $row['password_hash'],
                        $row['user_role'],
                        $row['user_status'],
                        $rowToMap['key_name'],
                        $rowToMap['type_student'],
                        (int)$rowToMap['approved_credits']
                    );
                } catch (Exception $e) {
                    return null; // Error al instanciar Student
                }

            // luego: Admin, Profesor, Coordinador

        case 'coordinador':
                $conn = Database::connection();
                $sql = "SELECT 
                            s.code,
                            sc.key_name,
                            s.type_student,
                            s.approved_credits
                        FROM student s
                        LEFT JOIN school sc
                        ON s.school_code = sc.code
                        WHERE s.code = ?
                        LIMIT 1";
                $rowsToMap = $conn->query($sql, [$row['code']])->fetchArray();
                if (empty($rowsToMap)) {
                    return null; // No hay datos de estudiante
                }
                $rowToMap = $rowsToMap[0];

                try {
                    return new Student(
                        (int)$row['id'],
                        $row['code'],
                        $row['names'],
                        $row['lastnames'],
                        $row['email'],
                        $row['password_hash'],
                        $row['user_role'],
                        $row['user_status'],
                        $rowToMap['key_name'],
                        $rowToMap['type_student'],
                        (int)$rowToMap['approved_credits']
                    );
                } catch (Exception $e) {
                    return null; // Error al instanciar Student
                }

        case 'administrador':
                $conn = Database::connection();
                $sql = "SELECT 
                            s.code,
                            sc.key_name,
                            s.type_student,
                            s.approved_credits
                        FROM student s
                        LEFT JOIN school sc
                        ON s.school_code = sc.code
                        WHERE s.code = ?
                        LIMIT 1";
                $rowsToMap = $conn->query($sql, [$row['code']])->fetchArray();
                if (empty($rowsToMap)) {
                    return null; // No hay datos de estudiante
                }
                $rowToMap = $rowsToMap[0];

                try {
                    return new Student(
                        (int)$row['id'],
                        $row['code'],
                        $row['names'],
                        $row['lastnames'],
                        $row['email'],
                        $row['password_hash'],
                        $row['user_role'],
                        $row['user_status'],
                        $rowToMap['key_name'],
                        $rowToMap['type_student'],
                        (int)$rowToMap['approved_credits']
                    );
                } catch (Exception $e) {
                    return null; // Error al instanciar Student
                }

        }

        throw new RuntimeException('Rol no soportado');
    }
}
