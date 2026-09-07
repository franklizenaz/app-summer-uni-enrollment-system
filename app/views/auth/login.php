<!DOCTYPE html>

<html class="light" lang="es"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - Sistema de Matrícula UNI</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- icono de la pagina con el logo UNI-->
<link rel="icon" type="image/png" href="/assets/img/uni-logo.png"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Theme Config -->
<script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {primary: "#880101", "primary-dark": "#880101c1", "background-light": "#f8f5f5", "background-dark": "#230f0f", "surface-light": "#ffffff", "surface-dark": "#1a2133", "text-light": "#0d111b", "text-dark": "#f8f9fc", "subtext-light": "#4c5f9a", "subtext-dark": "#94a3b8", "border-light": "#e7eaf3", "border-dark": "#2d3748"}, fontFamily: {display: "Lexend", body: ["Noto Sans", "sans-serif"]}, borderRadius: {DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px"}}}};</script>
</head>


<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-display antialiased transition-colors duration-200">

    <!-- Main Container -->
    <div class="relative flex min-h-screen w-full flex-col overflow-hidden">
        <!-- Header -->
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark px-10 py-3 z-20 shadow-sm relative">

            <div class="flex items-center gap-4 text-text-light dark:text-text-dark">
                <div class="size-8 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl">school</span>
                </div>
                <div>
                    <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">Sistema de Matrícula - Verano UNI 2026</h2>
                    <p class="text-xs text-subtext-light dark:text-subtext-dark font-normal">Ciclo de Verano 2025-III</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Aqui el boton el cual nos redirigirá al siguiente link: https://chat.whatsapp.com/G73pW7mJ4dF5GF4wCr8n1o -->
                <a class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-bold text-primary dark:text-white hover:bg-primary/10 rounded-lg transition-colors" href="https://chat.whatsapp.com/G73pW7mJ4dF5GF4wCr8n1o">
                    <span class="material-symbols-outlined text-[20px]">help</span>
                    <span class="hidden sm:inline">Ayuda y Soporte</span>
                </a>
            </div>
        </header>

    <!-- Content Area -->
        <main class="flex-1 flex relative">
            <!-- Left Side: Hero / Image (Hidden on mobile) -->
            <div class="hidden lg:flex w-1/2 relative bg-primary/5 items-center justify-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img alt="FIEECS-UNI campus building architecture" class="w-full h-full object-cover opacity-90 brightness-[0.85] dark:brightness-[0.4]" data-alt="FIEECS-UNI campus building architecture" src="/assets/img/login-bg.jpeg"/>
                <div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-primary/40 mix-blend-multiply"></div>
                </div>

                <div class="relative z-10 p-12 text-white max-w-xl">
                    <div class="mb-6 inline-flex items-center justify-center p-3 bg-white/20 backdrop-blur-md rounded-xl border border-white/30">
                        <span class="material-symbols-outlined text-3xl">map</span>
                    </div>

                <!-- Aquí el Título y Subtitulo que presentan el formulario login para el Sistema de Gestión de Pre y Matrícula Verano 2026-->
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Gestiona tu Matrícula </h1>
                    <p class="text-lg text-white/90 leading-relaxed mb-8">Planifica tu verano con nuestra nueva herramienta virtual.</p>
                    <div class="flex gap-4">
                        <div class="flex items-center gap-2 bg-black/20 backdrop-blur-sm px-4 py-2 rounded-lg border border-white/10">
                            <span class="material-symbols-outlined text-yellow-400">verified_user</span>
                            <span class="text-sm font-medium">Acceso Seguro</span>
                        </div>
                        <div class="flex items-center gap-2 bg-black/20 backdrop-blur-sm px-4 py-2 rounded-lg border border-white/10">
                            <span class="material-symbols-outlined text-blue-400">engineering</span>
                            <span class="text-sm font-medium">Soporte Técnico TEFIEECS</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Forms -->
            <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-6 md:p-12 lg:p-24 bg-background-light dark:bg-background-dark relative">
                <!-- Background decorative elements for right side -->
                <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
                <span class="material-symbols-outlined text-9xl text-primary">engineering</span>
                </div>
                <div class="w-full max-w-[420px] z-10">
                <!-- Login Form Section -->
                <div class="flex flex-col animate-fade-in" id="login-section">
                    <!-- Form Header -->
                    <div class="mb-8 text-center lg:text-left">
                        <h1 class="text-3xl font-bold text-text-light dark:text-text-dark mb-2">Bienvenido Alumno</h1>
                        <p class="text-subtext-light dark:text-subtext-dark">Explora todos los recursos disponibles para tu matrícula.</p>
                    </div>

                    <?php if (!empty($_SESSION['error'])): ?>
                        <div class="mb-4 rounded-lg bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300 p-3 text-sm">
                            <?= htmlspecialchars($_SESSION['error']) ?>
                        </div>
                    <?php unset($_SESSION['error']); endif; ?>
                    
                    <section id="login-section">
                        <?php if (!empty($_SESSION['auth'])): ?>
                            <!-- Usuario autenticado -->
                            <div class="p-4 text-center">
                                <p class="font-semibold">
                                    Sesión iniciada como<br>
                                    <span class="text-primary"><?= htmlspecialchars($_SESSION['auth']['name']) ?></span>
                                </p>

                                <a href="/home/index"
                                class="mt-4 inline-flex items-center justify-center w-full rounded-lg bg-primary text-white font-bold py-3 hover:bg-primary-dark transition">
                                    Ir al sistema
                                </a>
                            </div>

                        <?php else: ?>
                            <!-- Botón Google OAuth -->
                            <a href="/auth/google"
                            class="w-full flex items-center justify-center gap-3 rounded-lg border border-border-light dark:border-border-dark
                                    bg-surface-light dark:bg-surface-dark py-3 font-semibold
                                    hover:bg-gray-50 dark:hover:bg-gray-800 transition shadow-sm">

                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                    alt="Google"
                                    class="w-5 h-5">

                                <span>Ingresar con Correo Institucional</span>
                            </a>

                            <p class="text-xs text-center text-subtext-light dark:text-subtext-dark mt-4">
                                Usa tu cuenta Google institucional UNI (@uni.pe)
                            </p>
                        <?php endif; ?>

                    </section>


                </div>
            </div>
        </main>
    </div>
    <!-- Simple CSS Animation for section switching -->
    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <!-- Aqui la logica que hará que el botón de visibilidad de la contraseña funcione -->
    <script>
        document.querySelectorAll('button[type="button"]').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    button.innerHTML = '<span class="material-symbols-outlined text-[20px]">visibility_off</span>';
                } else {
                    input.type = 'password';
                    button.innerHTML = '<span class="material-symbols-outlined text-[20px]">visibility</span>';
                }
            });
        });
    </script>
</body>
</html>
