<?php 
    $repoDash = new DashboardRepository();
    $repoEnroll = new EnrollCoursesRepository();
    $totalMatriculas = $repoEnroll->totalEnrolledStudents();
    $totalMatriculados = $repoEnroll->totalUniqueEnrolledStudents();
    $cursosOfertados = $repoEnroll->totalUniqueEnrollCourses();
?>

<main class="mt-[50px] flex-1 overflow-y-auto bg-background-light dark:bg-background-dark">
    <div class="max-w-[1280px] mx-auto flex flex-col gap-8">
        <!-- Page Heading & Actions -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-[#0d111b] dark:text-white text-3xl font-bold tracking-tight">Dashboard <span class="text-[#4c5f9a] font-light text-2xl">| Verano 2025-3</span></h1>
                <p class="text-[#4c5f9a] mt-1 text-sm">Gestión de matrículas, cursos y carga docente.</p>
            </div>
            <a href="/curriculum/map" class="group flex items-center justify-center gap-2 bg-white dark:bg-[#1a202c] border border-[#cfd5e7] dark:border-gray-700 hover:border-primary hover:text-primary text-[#0d111b] dark:text-white rounded-lg px-4 py-2 transition-all shadow-sm">
                <span class="material-symbols-outlined text-[20px] group-hover:text-primary transition-colors">map</span>
                <span class="font-medium text-sm">Ver Malla Visual</span>
            </a>
        </div>



        <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] gap-4">
            
            <!-- Columna izquierda: KPIs -->
            <div class="flex flex-col gap-6">
            
                <!-- KPI 1 -->
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm">
                    <p class="text-[#4c5f9a] text-sm font-medium">Total Matriculas</p>
                    <p class="text-3xl font-bold counter" data-value="<?= $totalMatriculas ?>">0</p>

                    <p class="text-[#4c5f9a] text-xs mt-1">Solicitudes registradas</p>
                </div>

                    <!-- KPI 2 -->
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm">
                    <p class="text-[#4c5f9a] text-sm font-medium">Total Matriculados</p>
                    <p class="text-[#0d111b] dark:text-white text-3xl font-bold mt-2"><?= $totalMatriculados ?></p>
                    <p class="text-[#4c5f9a] text-xs mt-1">Alumnos activos</p>
                </div>

                <!-- KPI 3 -->
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm">
                    <p class="text-[#4c5f9a] text-sm font-medium">Cursos Ofertados</p>
                    <p class="text-[#0d111b] dark:text-white text-3xl font-bold mt-2"><?= $cursosOfertados ?></p>
                    <p class="text-[#4c5f9a] text-xs mt-1">Secciones abiertas</p>
                </div>

            </div>



        <!-- Área analítica -->
        <div class="bg-white dark:bg-[#1a202c] rounded-xl border border-[#cfd5e7] dark:border-gray-700 shadow-sm p-6 flex flex-col gap-6">
            
            <!-- Header -->
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-[#0d111b] dark:text-white">
                        Matrícula por ciclo académico
                    </h3>
                    <p class="text-sm text-[#4c5f9a]">
                        Distribución relativa de alumnos matriculados
                    </p>
                </div>
            </div>

            <?php 
                $cycles = range(1, 10);
                $data = $repoDash->countEnrollmentsByCycle(['Estadística','Económica']);

                $countOf = [];
                foreach ($cycles as $cycle) {
                    $countOf[$cycle] = $data[$cycle] ?? 0;
                }

                $max = max($countOf) ?: 1;
                $cycleMax = array_search($max, $countOf, true);
                $cycleLabel = 'Ciclo ' . Roman::Numeral($cycleMax);
                $cycleLabel = $cycleMax ? 'Ciclo ' . Roman::Numeral($cycleMax)  : 'Sin datos';



                function height($value, $max, $maxPx = 200) {
                    return intval(($value / $max) * $maxPx);
                }
            ?>

            <!-- Gráfica fake (placeholder visual) -->
            <div class="flex items-end justify-between gap-4 h-[200px]">
            <?php foreach ($countOf as $cycle => $count): ?>
                <div class="flex flex-col items-center w-10">
                    <div class="w-full bg-primary rounded-t-lg bar-animate" data-height="<?= height($count, $max) ?>" title="<?= $count ?> matrículas"></div>
                    <span class="text-xs mt-2 text-[#4c5f9a]">
                        <?=Roman::Numeral($cycle) ?>
                    </span>
                </div>
            <?php endforeach; ?>
            </div>


            <!-- Indicadores -->
            <div class="grid grid-cols-1 gap-4">
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 text-center">
                    <p class="text-xs text-[#4c5f9a]">
                        1er Ciclo con mayor demanda
                    </p>
                    <p class="text-xl font-bold text-[#0d111b] dark:text-white">
                        <?= $cycleLabel ?>
                    </p>
                    <p class="text-xs text-slate-500 mt-1">
                        <?= $max ?> matrículas
                    </p>
                </div>
            </div>


        </div>

    </div>

 
        <!-- Main Content Section -->
        <div class="bg-white dark:bg-[#1a202c] border border-[#cfd5e7] dark:border-gray-700 rounded-xl shadow-sm overflow-hidden flex flex-col">
            <!-- Filters Toolbar -->
            <div class="p-4 border-b border-[#e7eaf3] dark:border-gray-700 flex flex-col lg:flex-row justify-between gap-4 items-center bg-white dark:bg-[#1a202c]">
                <div class="flex flex-wrap gap-2 w-full lg:w-auto">
                    <button class="flex h-9 items-center gap-2 rounded-lg bg-primary/10 px-4 text-sm font-medium text-primary hover:bg-primary/20 transition-colors">
                        <span>Todos</span>
                    </button>
                    <button class="flex h-9 items-center gap-2 rounded-lg border border-[#cfd5e7] dark:border-gray-600 px-4 text-sm font-medium text-[#0d111b] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span>Escuela</span>
                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                    </button>
                    <button class="flex h-9 items-center gap-2 rounded-lg border border-[#cfd5e7] dark:border-gray-600 px-4 text-sm font-medium text-[#0d111b] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span>Estado</span>
                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                    </button>
                    <button class="flex h-9 items-center gap-2 rounded-lg border border-[#cfd5e7] dark:border-gray-600 px-4 text-sm font-medium text-[#0d111b] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span>Ciclo</span>
                        <span class="material-symbols-outlined text-[18px]">expand_more</span>
                    </button>
                </div>
                <div class="flex gap-3 w-full lg:w-auto">
                    <div class="relative flex-1 lg:w-64">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-[#4c5f9a] text-[20px]">search</span>
                        <input class="h-9 w-full rounded-lg border border-[#cfd5e7] dark:border-gray-600 pl-10 pr-4 text-sm focus:border-primary focus:ring-primary dark:bg-gray-800 dark:text-white" placeholder="Buscar curso..." type="text" />
                    </div>
                    <button class="flex h-9 items-center gap-2 rounded-lg bg-primary px-4 text-sm font-medium text-white hover:bg-blue-700 transition-colors shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">download</span>
                        <span class="hidden sm:inline">Exportar</span>
                    </button>
                </div>
            </div>
            <!-- Course Table -->
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left text-sm whitespace-nowrap">
                    <thead class="bg-[#f8f9fc] dark:bg-gray-800 text-[#4c5f9a] font-medium border-b border-[#e7eaf3] dark:border-gray-700">
                        <tr>
                            <th class="px-6 py-4">Curso</th>
                            <th class="px-6 py-4">Créditos</th>
                            <th class="px-6 py-4">Profesor Asignado</th>
                            <th class="px-6 py-4 text-center">Matrícula</th>
                            <th class="px-6 py-4">Tipo</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e7eaf3] dark:divide-gray-700">

                    <?php foreach($repoDash->getIndexCoursesFromMultipleSchools(['Estadística','Económica'],"estado","available") as $code => $course):?>
                        <!-- Single Row -->
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-[#0d111b] dark:text-white font-medium"><?= $course->getNombre() ?></span>
                                    <span class="text-[#4c5f9a] text-xs"><?= $course->getCodigo() ?> • Esc. Prof. <?= $course->getEscuela() ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[#0d111b] dark:text-white"><?= $course->getCreditos() ?>.0</td>


                            <?php if(!empty(trim($course->getNombreProfesor()))):?>

                                <?php if($course->getEstadoProfesor()==="Por confirmar") : ?>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                                <span class="material-symbols-outlined text-[16px]">person_raised_hand</span>
                                            </div>
                                            <div>
                                                <p class="text-[#0d111b] dark:text-white text-sm font-medium"> <?= "Prof. " . $course->getNombreProfesor() ?>
                                                </p>
                                                <p class="text-[#4c5f9a] text-xs"><?= $course->getEstadoProfesor() ?? ""?></p>
                                            </div>
                                        </div>
                                    </td>

                                <?php endif ?>

                                <?php if($course->getEstadoProfesor()==="Asignado") : ?>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                                <span class="material-symbols-outlined text-[16px]">person_check</span>
                                            </div>
                                            <div>
                                                <p class="text-[#0d111b] dark:text-white text-sm font-medium"> <?= "Prof. " . $course->getNombreProfesor() ?>
                                                </p>
                                                <p class="text-[#4c5f9a] text-xs"><?= $course->getEstadoProfesor() ?? ""?></p>
                                            </div>
                                        </div>
                                    </td>

                                <?php endif ?>


                            <?php endif ?>

                            <?php if(empty(trim($course->getNombreProfesor()))):?>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center size-8 rounded-full bg-gray-100 dark:bg-gray-700 text-[#4c5f9a]">
                                        <span class="material-symbols-outlined text-[16px]">person_off</span>
                                    </div>
                                    <div>
                                        <p class="text-[#4c5f9a] text-sm font-medium italic">Sin asignar</p>
                                    </div>
                                </div>
                            </td>

                            <?php endif ?>

                            <?php 
                                $numPrematriculados = $repoEnroll->countEstudentsByCourse($course->getCodigo(),$course->getEscuela());
                                $numEstimados = $course->getCantidadEstimadaAlumnos();
                            ?>

                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1.5 w-full">
                                    <div class="flex justify-between text-xs font-medium">
                                        <span class="text-primary"></span>
                                        <span class="text-[#4c5f9a]"><?= $numPrematriculados ?>/<?= $numEstimados ?></span>
                                    </div>
                                    <div class="h-2 w-full rounded-full bg-[#e7eaf3] dark:bg-gray-700 overflow-hidden">
                                        <div class="h-full rounded-full bg-primary" style="width: <?= $numPrematriculados/$numEstimados  * 100 <= 100 ? $numPrematriculados/$numEstimados * 100 : 100 ?>%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <?php $colorTipo = $course->getTipo() === "obligatorio" ? "green" : "blue" ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-<?= $colorTipo ?></span>-100 text-<?= $colorTipo ?>-700 border border-<?= $colorTipo ?>-200">
                                    <span class="size-1.5 rounded-full bg-<?= $colorTipo ?>-600"></span> <?= $course->getTipo() ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <form action="/detail/course" method="post" class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <input type="hidden" name="school" value="<?= $course->getEscuela() ?>">
                                    <input type="hidden" name="course" value="<?= $course->getCodigo() ?>">
                                    <button class="text-[#4c5f9a] hover:text-primary p-1 rounded hover:bg-gray-100 dark:hover:bg-slate-700" title="Ver Curso">
                                        <span class="material-symbols-outlined text-[18px]">transition_push</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

   <style>
        .bar-animate {
            height: 0;
            transition: height 1s ease-out;
        }

    </style>

    <script>
    function animateCounter(el, duration = 1200) {
    const target = +el.dataset.value;
    let start = 0;
    const step = Math.max(1, Math.floor(target / (duration / 16)));

    function tick() {
        start += step;
        if (start >= target) {
        el.textContent = target;
        return;
        }
        el.textContent = start;
        requestAnimationFrame(tick);
    }
    tick();
    }

    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.counter').forEach(el => {
        animateCounter(el);
    });
    });


    document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.bar-animate').forEach(bar => {
        bar.style.height = bar.dataset.height + 'px';
    });
    });

    </script>