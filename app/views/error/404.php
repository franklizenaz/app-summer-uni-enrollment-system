<!DOCTYPE html>
<html lang="es" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página no encontrada | UNI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#a70101ff",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101522",
                    },
                    fontFamily: {
                        display: ["Lexend", "sans-serif"],
                    },
                },
            },
        };
    </script>

    <style>
        body {
            font-family: "Lexend", sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-background-light dark:bg-background-dark text-[#0d111b] dark:text-white">

    <div class="max-w-md w-full bg-white dark:bg-[#1a202c] border border-[#cfd5e7] dark:border-gray-700 rounded-xl shadow-sm p-8 text-center">

        <div class="flex justify-center mb-4">
            <span class="material-symbols-outlined text-primary text-[64px]">
                search_off
            </span>
        </div>

        <h1 class="text-2xl font-bold mb-2">
            Página no encontrada
        </h1>

        <p class="text-[#4c5f9a] text-sm mb-6">
            La página que buscas no existe o fue movida. 
            Verifica la dirección e intenta nuevamente.
        </p>

        <div class="flex flex-col gap-3">
            <button
                onclick="goBackSafe()"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-red-600 transition-colors"
            >
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                Volver
            </button>

            <script>
                function goBackSafe() {
                    if (window.history.length > 1) {
                        window.history.back();
                    } else {
                        window.location.href = "/";
                    }
                }
            </script>

            <a href="/"
               class="inline-flex items-center justify-center gap-2 rounded-lg border border-[#cfd5e7] dark:border-gray-600 px-4 py-2 text-sm font-medium text-[#0d111b] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <span class="material-symbols-outlined text-[18px]">home</span>
                Ir al Inicio
            </a>
        </div>

        <p class="text-xs text-[#4c5f9a] mt-6">
            Error 404 • UNI Gestión Académica
        </p>
    </div>

</body>
</html>
