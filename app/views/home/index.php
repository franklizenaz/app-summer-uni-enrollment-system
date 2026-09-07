
<!-- Profile & Stats Section -->
<section class="mt-[25px] grid grid-cols-1 gap-8 mb-4">
    <!-- Profile Card -->
    <div class="col-span-1 lg:col-span-2 bg-white dark:bg-[#151a2a] rounded-xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-6">
        <div class="relative shrink-0">
            <div class="mt-[5px] bg-center bg-no-repeat aspect-square bg-cover rounded-full size-28 border-4 border-slate-50 dark:border-slate-800" data-alt="Student Portrait" style='background-image: url("/assets/img/engineer-vector-icon.png");'>
            </div>
            <div class="absolute bottom-0 right-0 bg-green-500 size-4 rounded-full border-2 border-white dark:border-[#151a2a]"></div>
        </div>
        <div class="flex flex-col text-center sm:text-left pt-2">
            <div class="flex gap-2 text-xs font-semibold uppercase text-slate-400 tracking-wider mb-1">
                <span class="material-symbols-outlined text-sm">handshake</span>
                BIENVENIDO
            </div>
            <h2 class="text-slate-900 dark:text-white text-2xl font-bold leading-tight"><?= strtoupper($_SESSION['auth']['name']) ?></h2>
            <p class="text-primary font-medium text-sm mt-1">Código: <?= $_SESSION['auth']['code'] ?></p>
            <div class="mt-3 flex flex-wrap justify-center sm:justify-start gap-2">
                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs rounded-full font-medium">Ing. <?= $_SESSION['auth']['school'] ?></span>
                <span class="px-3 py-1 bg-<?= $_SESSION['auth']['type'] === 'Regular' ? 'green' : 'orange' ?>-100 dark:bg-green-900/30 text-<?= $_SESSION['auth']['type'] === 'Regular' ? 'green' : 'orange' ?>-700 dark:text-green-400 text-xs rounded-full font-medium flex items-center gap-1"><span class="material-symbols-outlined text-[14px]"><?= $_SESSION['auth']['type'] === 'Regular' ? 'check_circle' : 'change_circle' ?></span>Alumno <?= $_SESSION['auth']['type'] ?></span>
            </div>
        </div>
    </div>

</section>

<!-- Detailed Stats Row -->
<section class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-4">

    <div class="bg-white dark:bg-[#151a2a] p-4 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
        <div class="size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">credit_card</span>
        </div>
        <div>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Créditos Aprobados</p>
            <p class="text-slate-900 dark:text-white text-xl font-bold"><?= $_SESSION['auth']['credits'] ?></p>
        </div>
    </div>

    <div class="bg-white dark:bg-[#151a2a] p-4 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
        <div class="size-12 rounded-lg bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center text-purple-600 dark:text-purple-400">
            <span class="material-symbols-outlined">calendar_today</span>
        </div>
        <div>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Ciclo Relativo</p>
            <p class="text-slate-900 dark:text-white text-xl font-bold"><?= $_SESSION['auth']['relative_cycle_in_text'] ?></p>
        </div>
    </div>

    <div class="bg-white dark:bg-[#151a2a] p-4 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
        <div class="size-12 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
            <span class="material-symbols-outlined">check_circle</span>
        </div>
        <div>
            <p class="text-slate-500 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Estado Matrícula</p>
            <p class="text-slate-900 dark:text-white text-xl font-bold">Habilitado</p>
        </div>
    </div>
    
</section>


<section class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">

    <!-- Left Block: Upcoming Enrollments (1 column) -->
    <div class="col-span-1 bg-white dark:bg-[#151a2a] rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
        
        <!-- Header -->
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-slate-900 dark:text-white text-lg font-bold">
                Reglamentos y Resoluciones
            </h3>
        </div>

        <!-- Listado -->
        <ul class="h-full overflow-scroll h-[450px]  divide-y divide-slate-200 dark:divide-slate-800">

            <!-- Item -->
            <li class="px-6 py-4">
                <div class="flex justify-between items-start gap-4">

                    <!-- Columna izquierda -->
                    <div class="min-w-0">
                        <p class="text-slate-900 dark:text-white font-medium break-words">
                            Cronograma de Evaluaciones para cursos de nivelación Académica 2025-3
                        </p>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Fecha: —
                        </p>
                    </div>

                    <!-- Columna derecha -->
                    <div class="flex flex-col gap-2 shrink-0 items-center mt-auto">
                        <a href="#" target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-lg
                                bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Ver
                        </a>
                        <span class="inline-flex px-2.5 py-0.5 text-xs rounded-full font-medium
                                    bg-yellow-100 dark:bg-yellow-900/30
                                    text-yellow-700 dark:text-yellow-400">
                            Pendiente
                        </span>
                    </div>

                </div>
            </li>

            <!-- Item -->
            <li class="px-6 py-4">
                <div class="flex justify-between items-start gap-4">

                    <!-- Columna izquierda -->
                    <div class="min-w-0">
                        <p class="text-slate-900 dark:text-white font-medium break-words">
                            Cronograma de Actividades para cursos de nivelación Académica 2025-3
                        </p>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Fecha: 31 Dic. 2025
                        </p>
                    </div>

                    <!-- Columna derecha -->
                    <div class="flex flex-col gap-2 shrink-0 items-center mt-auto">
                        <a href="https://drive.google.com/file/d/1WlDpaYTm7Kg-wi7DxisvEv7blZOQbtfJ/view?usp=drive_link" target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-lg
                                bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Ver
                        </a>
                        <span class="inline-flex px-2.5 py-0.5 text-xs rounded-full font-medium
                                    bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400">
                            Publicado
                        </span>
                    </div>

                </div>
            </li>

            <!-- Item -->
            <li class="px-6 py-4">
                <div class="flex justify-between items-start gap-4">

                    <!-- Columna izquierda -->
                    <div class="min-w-0">
                        <p class="text-slate-900 dark:text-white font-medium break-words">
                            Reglamento de Cursos de Nivelación Académica 2025
                        </p>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Fecha: 29 Dic. 2025
                        </p>
                    </div>

                    <!-- Columna derecha -->
                    <div class="flex flex-col gap-2 shrink-0 items-center mt-auto">
                        <a href="https://drive.google.com/file/d/1ciEJedrNLW_Z3YKvd9QjCLKzPzrjFMDw/view?usp=drive_link" target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-lg
                                bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Ver
                        </a>
                        <span class="inline-flex px-2.5 py-0.5 text-xs rounded-full font-medium
                                    bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400">
                            Publicado
                        </span>
                    </div>

                </div>
            </li>

            <!-- Item -->
            <li class="px-6 py-4">
                <div class="flex justify-between items-start gap-4">

                    <!-- Columna izquierda -->
                    <div class="min-w-0">
                        <p class="text-slate-900 dark:text-white font-medium break-words">
                            Reglamento de Cursos de Nivelación Académica 2024
                        </p>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Fecha: 06 Ene. 2025
                        </p>
                    </div>

                    <!-- Columna derecha -->
                    <div class="flex flex-col gap-2 shrink-0 items-center mt-auto">
                        <a href="https://drive.google.com/file/d/1mczj2Ue8_nO2Yg-qtoCkXrCxG2vf2lRV/view?usp=drive_link" target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-lg
                                bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Ver
                        </a>
                        <span class="inline-flex px-2.5 py-0.5 text-xs rounded-full font-medium
                                    bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400">
                            Publicado
                        </span>
                    </div>

                </div>
            </li>

            <!-- Item -->
            <li class="px-6 py-4">
                <div class="flex justify-between items-start gap-4">

                    <!-- Columna izquierda -->
                    <div class="min-w-0">
                        <p class="text-slate-900 dark:text-white font-medium break-words">
                            RR - 0570 - 2022
                        </p>
                        <p class="text-slate-500 dark:text-slate-400 text-sm">
                            Fecha: 06 Ene. 2025
                        </p>
                    </div>

                    <!-- Columna derecha -->
                    <div class="flex flex-col gap-2 shrink-0 items-center mt-auto">
                        <a href="https://drive.google.com/file/d/1WJS-9FJwtYEjYFmmU3u7_lhpPXCEfGCi/view?usp=drive_link" target="_blank"
                        class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-lg
                                bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                            <span class="material-symbols-outlined text-sm">description</span>
                            Ver
                        </a>
                        <span class="inline-flex px-2.5 py-0.5 text-xs rounded-full font-medium
                                    bg-green-100 dark:bg-green-900/30
                                    text-green-700 dark:text-green-400">
                            Publicado
                        </span>
                    </div>

                </div>
            </li>

        </ul>
    </div>


    <!-- Right Block: Recent Activities (2 columns) -->
    <div class="col-span-1 lg:col-span-2 bg-white dark:bg
-[#151a2a] rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-slate-900 dark:text-white text-lg font-bold">Calendario de Actividades</h3>
        </div>
        <ul class="divide-y divide-slate-200 dark:divide-slate-800">
            <!-- <li class="px-6 py-4 flex justify-between items-center">
                <div>
                    <p class="text-slate-900 dark:text-white font-medium">Ciclo 2024-II</p>
                    <p class="text-slate-500 dark:text-slate-400 text-sm">Inicio: 01 Ago 2024</p>
                </div>
                <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 text-xs rounded-full font-medium">Pendiente</span>
            </li>
            <li class="px-6 py-4">
                <p class="text-slate-900 dark:text-white font-medium">Pago de matrícula aprobado</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm">10 Ene 2024, 02:15 PM</p>
            </li>
            <li class="px-6 py-4">
                <p class="text-slate-900 dark:text-white font-medium">Actualización de datos personales</p>
                <p class="text-slate-500 dark:text-slate-400 text-sm">05 Ene 2024, 11:00 AM</p>
            </li> -->
        </ul>   
    </div>
</section>
