
<!-- Page Header & Stats -->
<div class="mt-[50px] flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 pb-6 border-b border-[#e7eaf3] dark:border-gray-800">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-3xl">school</span>
<h1 class="text-[#0d111b] dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">Malla Curricular 18-II</h1>
</div>
<p class="text-[#4c5f9a] text-base font-normal pl-11">Mapea tus cursos de carrera por ciclo académico.</p>
</div>
<!-- Stats Cards -->
<div class="flex flex-wrap gap-3 w-full lg:w-auto">

    <div class="flex min-w-[140px] flex-1 lg:flex-none flex-col gap-1 rounded-xl bg-white dark:bg-[#1a202e] border border-[#cfd5e7] dark:border-gray-700 p-3 items-start shadow-sm">
        <div class="flex items-center gap-2 mb-1 text-[#4c5f9a]">
            <span class="material-symbols-outlined text-[18px]">timeline</span>
            <span class="text-xs font-semibold uppercase">Ciclo Relativo</span>
        </div>
        <p class="text-[#0d111b] dark:text-white text-xl font-bold"><?= $_SESSION['auth']['relative_cycle_in_text'] ?></p>
    </div>


    <div class="flex min-w-[140px] flex-1 lg:flex-none flex-col gap-1 rounded-xl bg-white dark:bg-[#1a202e] border border-[#cfd5e7] dark:border-gray-700 p-3 items-start shadow-sm">
        <div class="flex items-center gap-2 mb-1 text-[#4c5f9a]">
            <span class="material-symbols-outlined text-[18px]">school</span>
            <span class="text-xs font-semibold uppercase">Escuela Profesional</span>
        </div>
        <p class="text-[#0d111b] dark:text-white text-xl font-bold"><?= $_SESSION['auth']['school'] ?></p>
    </div>

</div>
</div>


<?php $repositorioCursos = new CourseRepository($_SESSION['auth']['school']) ?>


<div class="flex-1 flex flex-col gap-6 min-w-0">


    <!-- Toolbar -->
    <div class="flex flex-wrap items-center justify-between gap-4 bg-white dark:bg-[#1a202e] p-3 rounded-xl border border-[#e7eaf3] dark:border-gray-800 shadow-sm">

        <div class="flex gap-2">
            <option class="flex h-10 items-center justify-center rounded-lg bg-[#f0f2f5] dark:bg-gray-800 p-1">

                <label checked class="flex cursor-pointer h-full items-center justify-center rounded-md px-3 bg-white dark:bg-[#2c3444] shadow-sm text-primary text-sm font-bold transition-all" id="label-malla">
                    <span class="material-symbols-outlined text-[18px] mr-2">grid_view</span>
                    <span>Vista Malla</span>
                    <input checked id="radio-malla" class="invisible w-0 absolute" name="view-mode" type="radio" value="malla"/>
                </label>

                <label class="flex cursor-pointer h-full items-center justify-center rounded-md px-3 text-[#4c5f9a] hover:bg-gray-200 dark:hover:bg-gray-700 text-sm font-medium transition-all" id="label-tabla">
                    <span class="material-symbols-outlined text-[18px] mr-2">table</span>
                    <span>Vista Tabular</span>
                    <input id="radio-tabla" class="invisible w-0 absolute" name="view-mode" type="radio" value="tabla"/>
                </label>
                
            </option>
        </div>

        <!-- Legend -->
        <div class="flex flex-wrap items-center gap-4 text-xs font-medium text-[#4c5f9a]" id="circle-horizontal-legend">
            Cursos:

            <div class="flex items-center gap-1.5">
                <div class="w-3 h-3 rounded-full bg-emerald-100 border border-emerald-500"></div>
                <span>Nivelación Disponibles</span>
            </div>

            <div class="flex items-center gap-1.5">
                <div class="w-3 h-3 rounded-full bg-primary"></div>
                <span class="text-primary font-bold">Ciclo Relativo Actual</span>
            </div>

            <div class="flex items-center gap-1.5">
                <div class="w-3 h-3 rounded-full bg-gray-100 border border-gray-300"></div>
                <span>Ciclos Superiores</span>
            </div>

            <div class="flex items-center gap-1.5">
                <div class="w-3 h-3 rounded-full bg-[#31bacc] border border-[#51bacc]"></div>
                <span>Electivos y Complementarios</span>
            </div>

        </div>





    </div>


    <div id="vista-malla">
        <div class="relative">
            <!--Flechas-scroll-->
            <button id="scroll-left"
                class="absolute left-0 top-1/2 -translate-y-1/2 z-10
                    bg-transparent border-none p-0
                    text-primary hover:text-primary/80
                    transition-transform hover:scale-110">

                <span class="material-symbols-outlined text-[56px] leading-none select-none">
                    arrow_circle_left
                </span>
            </button>

            <button id="scroll-right"
                class="absolute right-0 top-1/2 -translate-y-1/2 z-10
                    bg-transparent border-none p-0
                    text-primary hover:text-primary/80
                    transition-transform hover:scale-110">

                <span class="material-symbols-outlined text-[56px] leading-none select-none">
                    arrow_circle_right
                </span>
            </button>




            <!-- The Grid Container -->
            <div id="malla-scroll" class="overflow-x-auto pb-4 scrollbar-hide scroll-smooth">
                <div class="flex gap-6 min-w-[800px]">

                    <?php function cycleStatus(int $cycle, int $current): string {
                            if ($cycle < $current) return 'completed';
                            if ($cycle === $current) return 'current';
                            return 'future';
                        }
                    ?>

                    <?php foreach ($repositorioCursos->getAtributeCourses("tipo","obligatorio") as $cycle => $cycleCourses): ?>
                    
                    <?php
                        $status = cycleStatus($cycle, (int) $_SESSION['auth']['relative_cycle_in_number']);

                        $cycleHeaderClass = match ($status) {
                            'completed' => 'border-emerald-500 text-emerald-600',
                            'current'   => 'border-primary text-primary',
                            'future'    => 'border-gray-300 text-gray-400',
                        }; 
                    ?>

                        <div class="flex-1 min-w-[220px] flex flex-col gap-3">
                            <div class="text-center py-2 border-b-2 <?= $cycleHeaderClass ?>">
                                <h3 class="font-bold">Ciclo <?= $cycle ?></h3>
                            </div>

                            <?php foreach ($cycleCourses as $course): ?>
                                
                                <?php if ($status === 'completed'): ?>
                                <div class="relative cursor-pointer flex flex-col gap-2 rounded-lg bg-white border border-black-400 p-4 hover:-translate-y-1 transition-all">
                                    <div class="flex justify-between">
                                        <span class="text-[10px] font-bold text-black uppercase"><?= $course->getCodigo() ?></span>
                                        <span class="text-[10px] font-bold bg-black/10 px-1.5 py-0.5 rounded">
                                            <?= $course->getCreditos() ?> Cr
                                        </span>                                    
                                    </div>
                                    <p class="font-bold text-black-500"><?= $course->getNombre() ?></p>
                                    <div class="text-xs text-black-400">
                                        Req: <?= $course->getPrerequisitos() ? : '—' ?>
                                    </div>
                                </div>
                                <?php endif; ?>


                                <?php if ($status === 'current'): ?>
                                    <div class="relative cursor-pointer flex flex-col gap-2 rounded-lg bg-primary text-white border-2 border-primary p-4 shadow-md hover:-translate-y-1 transition-all">
                                        <div class="flex justify-between">
                                            <span class="text-[10px] font-bold uppercase"><?= $course->getCodigo() ?></span>
                                            <span class="text-[10px] font-bold bg-white/20 px-1.5 py-0.5 rounded">
                                                <?= $course->getCreditos() ?> Cr
                                            </span>
                                        </div>
                                        <p class="font-bold text-lg leading-tight"><?= $course->getNombre() ?></p>
                                        <div class="text-xs text-black-400">
                                            Req: <?= $course->getPrerequisitos() ? : '—' ?>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <?php if ($status === 'future'): ?>
                                <div class="relative cursor-pointer flex flex-col gap-2 rounded-lg bg-white border border-black-400 p-4 hover:-translate-y-1 transition-all">
                                    <div class="flex justify-between">
                                        <span class="text-[10px] font-bold text-black uppercase"><?= $course->getCodigo() ?></span>
                                        <span class="text-[10px] font-bold bg-white/10 px-1.5 py-0.5 rounded">
                                            <?= $course->getCreditos() ?> Cr
                                        </span>                                    
                                    </div>
                                    <p class="font-bold text-black-500"><?= $course->getNombre() ?></p>
                                    <div class="text-xs text-black-400">
                                        Req: <?= $course->getPrerequisitos() ? : '—' ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                            <?php endforeach; ?>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <div class="text-center py-4 border-b-2 text-[#31bacc]">
            <h1 class="font-bold">Cursos Electivos y Electivos Complementarios</h1>
        </div>
        <br/>

        <div class="flex pb-4 scrollbar-hide">
            
            <div class="grid grid-cols-5 gap-6 min-w-[800px]">

                <?php foreach ($repositorioCursos->getAtributeCourses("tipo","electivo") as $cycle => $cycleCourses): ?>  

                <?php foreach ($cycleCourses as $course): ?>
                        <div class="relative cursor-pointer flex flex-col gap-2 rounded-lg bg-[#31bacc] border border-black-400 p-4 hover:-translate-y-1 transition-all">
                            <div class="flex justify-between">
                                <span class="text-[10px] font-bold text-black uppercase"><?= $course->getCodigo() ?></span>
                                <span class="text-[10px] font-bold bg-white/10 px-1.5 py-0.5 rounded">
                                    <?= $course->getCreditos() ?> Cr
                                </span>                                    
                            </div>
                            <p class="font-bold text-black-500"><?= $course->getNombre() ?></p>
                            <div class="text-xs text-black-400">
                                Req: <?= $course->getPrerequisitos() ? : '—' ?>
                            </div>
                        </div>
                <?php endforeach; ?>


                <?php endforeach; ?>

            </div>
        </div>


    </div>


    <div id="vista-tabla" class="hidden">
        <div class="bg-white dark:bg-[#1a202e] rounded-xl p-4 border border-gray-200 dark:border-gray-800">
            <div class="container mx-auto px-4 py-8 font-body">

                <h1 class="text-2xl font-bold font-display mt-[-20px] mb-[15px] flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">menu_book</span>
                    Cursos Regulares
                </h1>

                <?php foreach ($repositorioCursos->getAtributeCourses("tipo","obligatorio") as $cycle => $cycleCourses): ?>

                    <section class="mb-10 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                        <!-- Header del ciclo -->
                        <div class="bg-gray-50 px-6 py-4 border-b flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">school</span>
                            <h2 class="text-xl font-semibold font-display">
                                Ciclo <?= $cycle ?>
                            </h2>
                        </div>

                        <!-- Tabla -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-100 text-gray-700 uppercase tracking-wide text-xs">
                                    <tr>
                                        <th class="px-4 py-3 text-left">Código</th>
                                        <th class="px-4 py-3 text-left">Curso</th>
                                        <th class="px-4 py-3 text-center">Créditos</th>
                                        <th class="px-4 py-3 text-left">Prerrequisitos</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">

                <?php foreach ($cycleCourses as $course): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-mono text-primary">
                            <?= htmlspecialchars($course->getCodigo()) ?>
                        </td>

                        <td class="px-4 py-3">
                            <?= htmlspecialchars($course->getNombre()) ?>
                        </td>

                        <td class="px-4 py-3 text-center font-semibold">
                            <?= $course->getCreditos() ?>
                        </td>

                        <td class="px-4 py-3 text-gray-600"><?= $course->getPrerequisitos() ? : '—' ?> </td>
                    </tr>
                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                <?php endforeach; ?>

                <h1 class="text-2xl font-bold font-display mt-[30px] mb-[15px] flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">menu_book</span>
                    Cursos Electivos y Electivos Complementarios
                </h1>

                <?php foreach ($repositorioCursos->getAtributeCourses("tipo","electivo") as $cycle => $cycleCourses): ?>
                    <section class="mb-10 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                        <!-- Header del ciclo -->
                        <div class="bg-gray-50 px-6 py-4 border-b flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">school</span>
                            <h2 class="text-xl font-semibold font-display">
                                Ciclo <?= $cycle ?>
                            </h2>
                        </div>

                        <!-- Tabla -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-100 text-gray-700 uppercase tracking-wide text-xs">
                                    <tr>
                                        <th class="px-4 py-3 text-left">Código</th>
                                        <th class="px-4 py-3 text-left">Curso</th>
                                        <th class="px-4 py-3 text-center">Créditos</th>
                                        <th class="px-4 py-3 text-left">Prerrequisitos</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">

                                    <?php foreach ($cycleCourses as $course): ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-3 font-mono text-primary">
                                            <?= htmlspecialchars($course->getCodigo()) ?>
                                        </td>

                                        <td class="px-4 py-3">
                                            <?= htmlspecialchars($course->getNombre()) ?>
                                        </td>

                                        <td class="px-4 py-3 text-center font-semibold">
                                            <?= $course->getCreditos() ?>
                                        </td>

                                        <td class="px-4 py-3 text-gray-600"><?= $course->getPrerequisitos() ? : '—' ?> </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>


<script>
    const radioMalla = document.getElementById('radio-malla');
    const radioTabla = document.getElementById('radio-tabla');
    const vistaMalla = document.getElementById('vista-malla');
    const vistaTabla = document.getElementById('vista-tabla');
    const labelMalla = document.getElementById('label-malla');
    const labeltabla = document.getElementById('label-tabla');
    const legend = document.getElementById('circle-horizontal-legend')

function cambiarVista() {

    if (radioTabla.checked) {

        vistaTabla.classList.remove('hidden');
        vistaMalla.classList.add('hidden');

        labelMalla.classList.remove(
            'bg-white',
            'dark:bg-[#2c3444]',
            'shadow-sm',
            'font-bold'
        );

        labelMalla.classList.add(
            'text-[#4c5f9a]',
            'hover:bg-gray-200',
            'dark:hover:bg-gray-700',
            'font-medium'
        );

        labeltabla.classList.remove(
            'text-[#4c5f9a]',
            'hover:bg-gray-200',
            'dark:hover:bg-gray-700',
            'font-medium'
        );

        labeltabla.classList.add(
            'bg-white',
            'dark:bg-[#2c3444]',
            'shadow-sm',
            'font-bold'
        );
        legend.classList.add('hidden');


    } else {

        vistaMalla.classList.remove('hidden');
        vistaTabla.classList.add('hidden');

        labeltabla.classList.remove(
            'bg-white',
            'dark:bg-[#2c3444]',
            'shadow-sm',
            'font-bold'
        );

        labeltabla.classList.add(
            'text-[#4c5f9a]',
            'hover:bg-gray-200',
            'dark:hover:bg-gray-700',
            'font-medium'
        );

        labelMalla.classList.add(
            'bg-white',
            'dark:bg-[#2c3444]',
            'shadow-sm',
            'font-bold'
        );

        labelMalla.classList.remove(
            'text-[#4c5f9a]',
            'hover:bg-gray-200',
            'dark:hover:bg-gray-700',
            'font-medium'
        );
        legend.classList.remove('hidden');
    }
}


    radioMalla.addEventListener('change', cambiarVista);
    radioTabla.addEventListener('change', cambiarVista);
</script>

<script>
    const scrollContainer = document.getElementById('malla-scroll');
    const btnLeft = document.getElementById('scroll-left');
    const btnRight = document.getElementById('scroll-right');

    function getStep() {
        // ancho de un ciclo (primer bloque)
        const firstCycle = scrollContainer.querySelector('.flex-1');
        return firstCycle ? firstCycle.offsetWidth + 24 : 300; // + gap
    }

    btnRight.addEventListener('click', () => {
        scrollContainer.scrollBy({
            left: getStep(),
            behavior: 'smooth'
        });
    });

    btnLeft.addEventListener('click', () => {
        scrollContainer.scrollBy({
            left: -getStep(),
            behavior: 'smooth'
        });
    });
</script>

