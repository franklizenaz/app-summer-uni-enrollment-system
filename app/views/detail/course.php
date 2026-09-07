<?php

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(400); // o 405 si prefieres semántica estricta
        header('Location: /error/error400');
        exit;
    }

    $FACTOR_H = 60.00;

    $school = $_POST["school"] ?? null;
    $course_code = $_POST["course"] ?? null;
    if ($school === null || $course_code === null) {
        http_response_code(400);
        header('Location: /error/error400');
        exit;
    }

    $repoCurso = new EnrollCoursesRepository();
    $course = $repoCurso->EnrollCourseByCode($school, $course_code);

    $repoEstu = new EnrollStudentsRepository();
    $students = $repoEstu->enrolledStudentsByCourse($school, $course_code);
?>

<main class="flex-1 flex justify-center py-6 md:py-8 px-4 md:px-8 lg:px-40">
    <div class="flex flex-col max-w-[1200px] flex-1 gap-6">
        <!-- Breadcrumbs -->
        <div class="flex flex-wrap gap-2 text-sm">
            <a class="text-[#4c5f9a] dark:text-gray-400 font-medium hover:text-primary hover:underline" href="/admin/dashboard">Dashboard</a>
            <span class="text-[#4c5f9a] dark:text-gray-500 font-medium">/</span>
            <span class="text-[#0d111b] dark:text-white font-medium"><?= $course->getCodigo() ?> - <?= $course->getNombre() ?></span>
        </div>
        <!-- Header Section -->
        <div class="grid grid-cols-12 md:flex-row justify-between items-start md:items-center gap-4 bg-white dark:bg-[#1a202c] p-6 rounded-xl border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm">
            <div class="col-span-8 flex flex-col gap-2">
                <div class="flex items-center gap-3">
                    <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider"><?= $course->getTipo() ?></span>
                    <h1 class="text-[#0d111b] dark:text-white text-3xl font-black leading-tight tracking-[-0.033em]"><?= $course->getNombre() ?></h1>
                </div>
                <div class="flex flex-wrap gap-x-4 gap-y-1 text-[#4c5f9a] dark:text-gray-400 text-sm md:text-base">
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">code</span> Código: <?= $course->getCodigo() ?></span>
                    <span class="hidden md:inline">•</span>
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">school</span> Ciclo: <?= Roman::Numeral($course->getCiclo()) ?></span>
                    <span class="hidden md:inline">•</span>
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">workspace_premium</span> Créditos: <?= $course->getCreditos() ?></span>
                    <span class="hidden md:inline">•</span>
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">domain</span> Escuela: <?= $course->getEscuela() ?></span>
                </div>
            </div>
            <div class="col-span-4 flex flex-col gap-6">
                <!-- Assigned Professor -->
                <div class="sticky bg-white dark:bg-[#1a202c] rounded-xl border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-[#e7eaf3] dark:border-[#2d3748] flex justify-between items-center">
                        <h3 class="text-[#0d111b] dark:text-white text-lg font-bold">Docente</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">


                            <?php if(!empty(trim($course->getNombreProfesor()))):?>

                                <?php if($course->getEstadoProfesor()==="Por confirmar") : ?>

                                    <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                        <span class="material-symbols-outlined text-[16px]">person_raised_hand</span>
                                    </div>
                                    <div>
                                        <p class="text-[#0d111b] dark:text-white font-bold text-base">Prof. <?= $course->getNombreProfesor() ?></p>
                                        <p class="text-[#4c5f9a] dark:text-gray-400 text-xs">Escuela Profesional de <?= $course->getEscuela() ?></p>
                                    </div>

                                <?php endif ?>

                                <?php if($course->getEstadoProfesor()==="Asignado") : ?>

                                    <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                        <span class="material-symbols-outlined text-[16px]">person_check</span>
                                    </div>
                                    <div>
                                        <p class="text-[#0d111b] dark:text-white font-bold text-base">Prof. <?= $course->getNombreProfesor() ?></p>
                                        <p class="text-[#4c5f9a] dark:text-gray-400 text-xs">Escuela Profesional de <?= $course->getEscuela() ?></p>
                                    </div>

                                <?php endif ?>


                            <?php endif ?>

                            <?php if(empty(trim($course->getNombreProfesor()))):?>

                                    <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                        <span class="material-symbols-outlined text-[16px]">person_off</span>
                                    </div>
                                    <div>
                                        <p class="text-[#0d111b] dark:text-white font-bold text-base">Sin Asignar</p>
                                    </div>

                            <?php endif ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Stat 1 -->
            <div class="flex flex-col gap-1 rounded-xl p-5 bg-white dark:bg-[#1a202c] border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm">
                <div class="flex items-center justify-between mb-1">
                    <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Pre-Matriculados</p>
                    <span class="material-symbols-outlined text-primary/60">person_add</span>
                </div>
                <p class="text-[#0d111b] dark:text-white text-2xl font-bold leading-tight"><?= $course->getCantidadEstimadaAlumnos() ?></p>
                <p class="text-xs text-green-600 flex items-center gap-1 font-medium"><span class="material-symbols-outlined text-[14px]">person_play</span> Sondeos Previos</p>
            </div>
            <!-- Stat 2 -->
            <div class="flex flex-col gap-1 rounded-xl p-5 bg-white dark:bg-[#1a202c] border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm">
                <div class="flex items-center justify-between mb-1">
                    <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Matriculados</p>
                    <span class="material-symbols-outlined text-primary/60">how_to_reg</span>
                </div>

                <?php
                    $numMatriculados = count($students) ?? 0;
                    $numEstimados = $course->getCantidadEstimadaAlumnos();
                ?>
                
                <p class="text-[#0d111b] dark:text-white text-2xl font-bold leading-tight"><?= $numMatriculados ?></p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-2">
                    <div class="bg-primary h-1.5 rounded-full" style="width: <?= floor($numMatriculados/$numEstimados*100) < 100 ? floor($numMatriculados/$numEstimados*100) : 100 ?>%"></div>
                </div>
                <p class="text-xs text-[#4c5f9a] mt-1"><?= ceil($numMatriculados/$numEstimados*100) ?>% de ocupación</p>
            </div>
            <!-- Stat 3 -->
            <div class="flex flex-col gap-1 rounded-xl p-5 bg-white dark:bg-[#1a202c] border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm">
                <div class="flex items-center justify-between mb-1">
                    <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Costo (Factor H)</p>
                    <span class="material-symbols-outlined text-primary/60">payments</span>
                </div>
                <p class="text-[#0d111b] dark:text-white text-2xl font-bold leading-tight">S/. <?= number_format(ceil(2*($course->getCreditos()+1)*8*$FACTOR_H/$numMatriculados), 2) ?></p>
                <p class="text-xs text-[#4c5f9a] dark:text-gray-500">Por alumno inscrito</p>
            </div>
            <!-- Stat 4 -->
            <div class="flex flex-col gap-1 rounded-xl p-5 bg-white dark:bg-[#1a202c] border border-[#e7eaf3] dark:border-[#2d3748] shadow-sm relative overflow-hidden group">
                <div class="absolute right-0 top-0 w-24 h-24 bg-primary/5 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
                <div class="flex items-center justify-between mb-1 z-10">
                    <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Costo Operativo</p>
                    <span class="material-symbols-outlined text-primary/60">account_balance</span>
                </div>
                <p class="text-[#0d111b] dark:text-white text-2xl font-bold leading-tight z-10">S/. <?= number_format(ceil(2*($course->getCreditos()+1)*8*$FACTOR_H), 2) ?></p>
                <p class="text-xs text-orange-600 flex items-center gap-1 font-medium z-10" title="Recaudación actual: S/. 4,800">
                    <!-- <span class="material-symbols-outlined text-[14px]">warning</span> Déficit: S/. 00.00 -->
                </p>
            </div>
        </div>
        <!-- Main Content Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column (Detail & Prereqs) -->
            <aside class="lg:col-span-7 xl:col-span-8 flex flex-col bg-white dark:bg-[#151a2d] rounded-xl shadow-sm border border-[#e7eaf3] dark:border-slate-800 overflow-hidden">
                <div class="p-4 border-b border-[#e7eaf3] dark:border-slate-800 flex justify-between items-center">
                    <h3 class="font-bold text-lg text-[#0d111b] dark:text-white">Detalle - Alumnos Matriculados</h3>
                </div>
                <div class="overflow-x-auto flex-1 custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-[#f8f9fc] dark:bg-slate-800 sticky top-0 z-10">
                            <tr>
                                <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider">Código</th>
                                <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider">Alumno</th>
                                <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Email</th>
                                <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Ciclo Relativo</th>
                                <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Tipo</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e7eaf3] dark:divide-slate-700">
                            <?php foreach($students as $code => $student):?>
                                <!-- Row 2 -->
                                <tr class="group hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors border-l-4 border-l-transparent">
                                    <td class="py-3 px-4">
                                        <span class="font-bold text-[#0d111b] dark:text-white text-sm"><?= $student->getCodigo() ?></span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-[#0d111b] dark:text-white"><?= $student->getNombres() . " " . $student->getApellidos() ?></span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="inline-flex items-center justify-center size-6 rounded bg-gray-100 dark:bg-slate-700 text-xs font-bold text-gray-700 dark:text-gray-300"><?= $student->getEmail() ?></span>
                                    </td>
                                    <td class="py-3 px-4 text-center text-sm text-[#0d111b] dark:text-gray-300">
                                        <?= $student->getCicloRelativo() ?>
                                    </td>
                                    <td class="py-3 px-4 text-center text-sm text-[#0d111b] dark:text-gray-300">
                                        <?= $student->getTipo() ?>
                                    </td>

                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </aside>
        </div>
    </div>
</main>