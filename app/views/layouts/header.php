<!DOCTYPE html>

<html class="light" lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>Sistema UNI</title>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;family=Noto+Sans:wght@300..800&amp;display=swap" rel="stylesheet"/>
        <!-- icono de la pagina con el logo UNI-->
        <link rel="icon" type="image/png" href="/assets/img/uni-logo.png"/>
        <!-- Material Symbols -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <!-- Theme Configuration -->
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "primary": "#880101",
                            "background-light": "#  ",
                            "background-dark": "#101522",
                        },
                        fontFamily: {
                            "display": ["Lexend", "sans-serif"],
                            "body": ["Noto Sans", "sans-serif"],
                        },
                        borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                    },
                },
            }
        </script>
        <style>
            html {
                font-size: 78.5%;
            }


            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            .icon-filled {
                font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

        </style>
    </head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-white font-display h-screen flex overflow-hidden">
<!-- Sidebar -->
    <aside class="w-72 bg-white dark:bg-[#151a2a] border-r border-slate-200 dark:border-slate-800 flex flex-col h-full shrink-0 transition-colors duration-300">
        <div class="p-6 flex items-center gap-3">
            <!-- aqui el div con el span de icono de birrete -->
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 bg-primary/10" data-alt="University Logo Abstract">
                <span class="material-symbols-outlined text-primary text-[32px] flex items-center justify-center size-10">school</span>
            </div>

            <div class="flex flex-col">
                <h1 class="text-slate-900 dark:text-white text-lg font-bold leading-tight">Sistema UNI</h1>
                <p class="text-slate-500 dark:text-slate-400 text-xs font-normal">Panel del Estudiante</p>
            </div>
        </div>


        <nav class="flex flex-col gap-2 px-4 flex-1 overflow-y-auto">

            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" href="/home/index">
                <span class="material-symbols-outlined text-[24px]">home</span>
                <span class="text-sm font-medium">Inicio</span>
            </a>

            <?php if (Auth::isCoordinador() || Auth::isAdministrador()): ?>
                <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" href="/admin/dashboard">
                    <span class="material-symbols-outlined text-[24px] icon-filled">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            <?php endif; ?>

            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" href="/profile/mycourses">
                <span class="material-symbols-outlined text-[24px] icon-filled">menu_book</span>
                <span class="text-sm font-medium">Mis Cursos</span>
            </a>

            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" href="/enrollment/prestart">
                <span class="material-symbols-outlined text-[24px]">box_edit</span>
                <span class="text-sm font-medium">Inscripciones</span>
            </a>


            <div class="mt-auto p-6 border-t border-[#e7eaf3] dark:border-gray-800">
                <a href="/auth/logout" class="flex items-center gap-1 px-1 py-2 rounded-lg bg-[#e7eaf3] dark:bg-gray-700 cursor-pointer">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8" data-alt="User Avatar" style='background-image: url("/assets/img/engineer-vector-icon.png");'></div>
                    <div class="overflow-hidden">
                        <p class="text-[#0d111b] dark:text-white text-sm font-medium leading-normal truncate"><?= $_SESSION['auth']['name'] ?></p>
                        <p class="text-[#4c5f9a] text-xs font-normal truncate">Cerrar Sesión</p>
                    </div>
                </a>
            </div>

        </nav>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-background-light dark:bg-background-dark relative">

        <!-- Aquí la lógica para que dependiendo el link , los a. del nav se pongan en active -->
        <script>
            // Obtener la URL actual
            const currentPath = window.location.pathname;

            // Seleccionar todos los enlaces de navegación
            const navLinks = document.querySelectorAll('nav a');

            // Recorrer los enlaces y agregar la clase activa si coincide con la URL actual
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('bg-primary', 'text-white');
                    link.classList.remove('text-slate-600', 'dark:text-slate-300', 'hover:bg-slate-50', 'dark:hover:bg-slate-800');
                    const icon = link.querySelector('.material-symbols-outlined');
                    if (icon) {
                        icon.classList.add('icon-filled');
                    }
                }
                else if(currentPath === '/' && link.getAttribute('href') === '/home/index'){
                        link.classList.add('bg-primary', 'text-white');
                        link.classList.remove('text-slate-600', 'dark:text-slate-300', 'hover:bg-slate-50', 'dark:hover:bg-slate-800');
                        const icon = link.querySelector('.material-symbols-outlined');
                        if (icon) {
                            icon.classList.add('icon-filled');
                        }
                }
            });
        </script>


        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8" style="max-height: 100vh;">
            <div class="max-w-[1200px] mx-auto flex flex-col">