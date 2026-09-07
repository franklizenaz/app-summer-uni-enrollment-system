# Product: Summer Uni Enrollment System
> Una plataforma web optimizada diseñada para agilizar el proceso de matrícula, validación y planificación de capacidad para los períodos académicos de verano de la universidad.

---

## 📌 Descripción general

Este proyecto es un módulo académico especializado en el proceso de **Matrícula del Período de Verano**. A diferencia de los semestres regulares, los períodos de verano son más intensivos, tienen límites específicos de créditos y requieren una validación rápida de prerrequisitos y pagos.

**Aspectos clave:**

- **Problema que resuelve:** Elimina el cuello de botella administrativo causado por las aprobaciones manuales y la resolución de conflictos durante los períodos de matrícula de alta concurrencia.
- **Relevancia:** Permite que los estudiantes recuperen créditos o avancen eficientemente en su plan de estudios, mientras la universidad optimiza el uso de sus recursos (aulas y docentes).
- **Contexto:** Se utiliza como un **Producto/Módulo** dentro de un ERP Académico más amplio (como Curriculum Nexus). Se integra con el desarrollo web transaccional y el análisis de datos para la predicción de la demanda.

---
## 🛠️ Tecnologías y herramientas

El sistema se ha construido utilizando un stack moderno, descentralizado y de alta disponibilidad para garantizar tiempos de respuesta inmediatos:

*   **Backend:** <span style="background-color: #4F5D95; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">PHP 8.x</span> (Arquitectura nativa bajo el patrón MVC y Repositories, gestionado con **Composer**).
*   **Frontend:** <span style="background-color: #E34F26; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">HTML5</span>, <span style="background-color: #1572B6; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">CSS3</span> y <span style="background-color: #F7DF1E; color: black; padding: 2px 6px; border-radius: 4px; font-size: 0.9em; font-weight: bold;">JavaScript (Vanilla)</span> para una interfaz ligera y veloz.
*   **Interactividad:** <span style="background-color: #007ACC; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">AJAX</span> para la comunicación asíncrona en tiempo real durante la selección de cursos y validaciones de cupos sin recargar la página.
*   **Base de datos:** <span style="background-color: #4E9F3D; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">Turso Database</span> (Arquitectura SQLite distribuida en el Cloud Edge), ideal para lecturas ultrarrápidas y baja latencia en momentos de alta concurrencia.
*   **Infraestructura y Despliegue:** <span style="background-color: #2496ED; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">Docker</span> para la contenedorización local y <span style="background-color: #8A2BE2; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.9em;">Zeabur</span> como plataforma PaaS para el despliegue e integración continua (CI/CD).


---

## 🎯 Objetivos

### Objetivo principal

Diseñar e implementar un sistema escalable que permita a los estudiantes matricularse en cursos de verano con **validación automática y en tiempo real** de prerrequisitos, horarios y situación financiera.

### Objetivos secundarios

- **Predicción de la demanda:** Utilizar datos históricos para sugerir el número óptimo de cupos/secciones para los cursos con mayor demanda.
- **Gestión de concurrencia:** Gestionar los picos de tráfico durante los primeros minutos de apertura de la matrícula utilizando la infraestructura elástica de Zeabur y la velocidad de Turso.
- **Reportes:** Generar paneles en tiempo real para los coordinadores académicos sobre las tasas de ocupación y las listas de espera.

### Fuera del alcance (Lo que NO es)

- **No es un Sistema de Gestión del Aprendizaje (LMS):** No aloja contenido de cursos, tareas ni videos con calificaciones (solo almacena las calificaciones finales necesarias para verificar prerrequisitos).
- **No es un sistema contable general:** Aunque consume el estado de los pagos mediante una API, no gestiona directamente todo el sistema contable de la universidad.

---

 ## 🧠 Contexto y motivación

 ### Origen

 La motivación de este proyecto surge del caos que normalmente se observa durante la **"Matrícula de Verano"**: sistemas que colapsan debido al tráfico, estudiantes que se matriculan en cursos para los que no cumplen los requisitos y modificaciones manuales que generan problemas de auditoría.

---

 ## 🗂️ Estructura del proyecto

 Si quieres, también puedo traducir la **estructura del proyecto completa** cuando la compartas.

````
 project-summer-uni-enrollment-system/
│
├── app/
│   │
│   ├── controllers/                 # Controladores de la aplicación
│   │   ├── AjaxController.php       # Gestión de solicitudes asíncronas
│   │   ├── AuthController.php       # Autenticación de usuarios
│   │   ├── CurriculumController.php # Gestión del plan curricular
│   │   ├── DetailController.php     # Visualización de detalles
│   │   ├── EnrollmentController.php # Proceso principal de matrícula
│   │   ├── ErrorController.php      # Manejo de errores
│   │   ├── HomeController.php       # Página principal
│   │   └── ProfileController.php    # Gestión del perfil de usuario
│   │
│   ├── core/                        # Núcleo de la aplicación
│   │   ├── App.php                  # Inicialización de la aplicación
│   │   ├── Autoload.php             # Carga automática de clases
│   │   ├── Connection.php           # Conexión a la base de datos
│   │   ├── Roles.php                # Gestión de roles
│   │   └── Router.php               # Sistema de enrutamiento
│   │
│   ├── helpers/                     # Funciones y utilidades auxiliares
│   │   ├── Auth.php                 # Utilidades de autenticación
│   │   ├── Database.php             # Funciones auxiliares de base de datos
│   │   ├── Relative.php             # Utilidades para rutas relativas
│   │   └── Render.php               # Renderizado de vistas
│   │
│   ├── models/                      # Modelos del dominio
│   │   ├── Course.php               # Entidad Curso
│   │   ├── Enrollment.php           # Entidad Matrícula
│   │   ├── EnrollmentStudent.php    # Relación Matrícula-Estudiante
│   │   ├── Student.php              # Entidad Estudiante
│   │   └── User.php                 # Entidad Usuario
│   │
│   ├── repositories/                # Acceso y persistencia de datos
│   │   ├── CourseRepository.php
│   │   ├── DashboardRepository.php
│   │   ├── EnrollmentRepository.php
│   │   ├── EnrollmentRepository.php
│   │   └── UserRepository.php
│   │
│   └── views/                       # Interfaz de usuario
│       ├── admin/                   # Vistas administrativas
│       ├── advice/                  # Vistas de asesoramiento
│       ├── ajax/                    # Componentes o respuestas AJAX
│       ├── auth/                    # Inicio de sesión y autenticación
│       ├── curriculum/              # Gestión curricular
│       ├── detail/                  # Vistas detalladas
│       ├── enrollment/              # Proceso de matrícula
│       ├── error/                   # Páginas de error
│       ├── home/                    # Página principal
│       ├── layouts/                 # Plantillas generales
│       └── profile/                 # Perfil del usuario
│
├── config/
│   └── config.php                   # Configuración general del sistema
│
├── public/                          # Punto de acceso público
│   ├── assets/                      # Recursos estáticos
│   └── index.php                    # Entry point de la aplicación
│
├── .dockerignore
├── .gitignore
├── composer.json                    # Dependencias PHP
├── composer.lock                    # Bloqueo de versiones de dependencias
├── dockerfile                       # Configuración de Docker
└── README.md                        # Documentación del proyecto`
````