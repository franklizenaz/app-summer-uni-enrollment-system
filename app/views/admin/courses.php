<?php   

    $dictionary = [];

    $repoEstCourses = new CourseRepository('Estadística');
    
    foreach($repoEstCourses->getAllCoursesForEnrollment() as $cycle => $courses){
        foreach($courses as $course){
            $dictionary[$course->getCodigo() . "-" . $course->getEscuela()] = $course;
        }
    }

    $repoEcoCourses = new CourseRepository('Económica');
    foreach($repoEcoCourses->getAllCoursesForEnrollment() as $cycle => $courses){
        foreach($courses as $course){
            $dictionary[$course->getCodigo() . "-" . $course->getEscuela()] = $course;
        }
    }

    ksort($dictionary);
    
?>

<!-- Page Heading -->
<div class="mt-[50px] flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div class="flex flex-col gap-4">
        <h1 class="text-[#0d111b] dark:text-white text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">Gestión de Cursos</h1>
        <p class="mt-[-10px] text-[#4c5f9a] dark:text-slate-400 text-base font-normal leading-normal">Administra los cursos, créditos y dependencias para el ciclo Verano 2025.</p>
    </div>
    <div class="flex gap-3">
        <!-- <button class="flex items-center gap-2 cursor-pointer overflow-hidden rounded-lg h-10 px-4 bg-white dark:bg-slate-800 border border-[#e7eaf3] dark:border-slate-700 text-[#0d111b] dark:text-white text-sm font-bold shadow-sm hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors">
            <span class="material-symbols-outlined text-[20px]">upload_file</span>
            <span>Importar Malla</span>
        </button> -->
        <button class="flex items-center gap-2 cursor-pointer overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold shadow-lg shadow-primary/30 hover:bg-red-600 transition-colors">
            <span class="material-symbols-outlined text-[20px]">add</span>
            <span>Nuevo Curso</span>
        </button>
    </div>
</div>
<!-- Filters Toolbar -->
<div class="mt-[20px] mb-[20px] bg-white dark:bg-[#151a2d] rounded-xl p-4 shadow-sm border border-[#e7eaf3] dark:border-slate-800 grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
    <div class="md:col-span-5 lg:col-span-6">
        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-1 uppercase tracking-wider">Buscar Curso</label>
        <div class="flex w-full items-center rounded-lg bg-[#f8f9fc] dark:bg-slate-800 border border-[#e7eaf3] dark:border-slate-700 focus-within:border-primary focus-within:ring-1 focus-within:ring-primary h-11 transition-all">
            <div class="pl-3 pr-2 text-[#4c5f9a] dark:text-slate-500">
                <span class="material-symbols-outlined">search</span>
            </div>
            <input class="w-full bg-transparent border-none text-[#0d111b] dark:text-white placeholder:text-[#9ca3af] text-sm focus:ring-0" placeholder="Buscar por código (ej. BMA01) o nombre..." />
        </div>
    </div>
    <div class="md:col-span-3 lg:col-span-3">
        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-1 uppercase tracking-wider">Facultad</label>
        <div class="relative">
            <select class="w-full appearance-none rounded-lg bg-[#f8f9fc] dark:bg-slate-800 border border-[#e7eaf3] dark:border-slate-700 text-[#0d111b] dark:text-white h-11 px-3 text-sm focus:ring-primary focus:border-primary">
                <option>Todas las Facultades</option>
                <option>Ingeniería de Sistemas</option>
                <option>Ingeniería Civil</option>
                <option>Ingeniería Industrial</option>
            </select>
            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#4c5f9a]">
                <span class="material-symbols-outlined text-[20px]">expand_more</span>
            </div>
        </div>
    </div>
    <div class="md:col-span-3 lg:col-span-2">
        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-1 uppercase tracking-wider">Ciclo</label>
        <div class="relative">
            <select class="w-full appearance-none rounded-lg bg-[#f8f9fc] dark:bg-slate-800 border border-[#e7eaf3] dark:border-slate-700 text-[#0d111b] dark:text-white h-11 px-3 text-sm focus:ring-primary focus:border-primary">
                <option>Todos</option>
                <option>Ciclo 1</option>
                <option>Ciclo 2</option>
                <option>Ciclo 3</option>
                <option>Ciclo 4</option>
                <option>Ciclo 5</option>
            </select>
            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[#4c5f9a]">
                <span class="material-symbols-outlined text-[20px]">expand_more</span>
            </div>
        </div>
    </div>
    <div class="md:col-span-1 flex justify-end md:justify-center pb-1">
        <button class="p-2 text-[#4c5f9a] hover:text-primary dark:text-slate-400 dark:hover:text-white transition-colors" title="Limpiar Filtros">
            <span class="material-symbols-outlined">filter_alt_off</span>
        </button>
    </div>
</div>
<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 h-full min-h-[600px]">
    <!-- Left Column: Course List -->
    <aside class="lg:col-span-7 xl:col-span-8 flex flex-col bg-white dark:bg-[#151a2d] rounded-xl shadow-sm border border-[#e7eaf3] dark:border-slate-800 overflow-hidden">
        <div class="p-4 border-b border-[#e7eaf3] dark:border-slate-800 flex justify-between items-center">
            <h3 class="font-bold text-lg text-[#0d111b] dark:text-white">Cursos Registrados</h3>
            <span class="text-xs font-medium bg-blue-50 dark:bg-blue-900/30 text-primary px-2 py-1 rounded-full">Total: <?= count($dictionary) ?></span>
        </div>
        <div class="overflow-x-auto flex-1 custom-scrollbar">
            <table class="w-full text-left border-collapse">
                <thead class="bg-[#f8f9fc] dark:bg-slate-800 sticky top-0 z-10">
                    <tr>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider">Código</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider">Nombre del Curso</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Ciclo</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Créd.</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Pre-reqs</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Prof.</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-center">Estado</th>
                        <th class="py-3 px-4 text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 uppercase tracking-wider text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e7eaf3] dark:divide-slate-700">
                    <!-- Row 1 (Active/Selected)
                    <tr class="group hover:bg-blue-50/50 dark:hover:bg-slate-700/30 transition-colors bg-blue-50/30 dark:bg-slate-800/50 border-l-4 border-l-primary cursor-pointer">
                        <td class="py-3 px-4">
                            <span class="font-bold text-[#0d111b] dark:text-white text-sm">BMA02</span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-medium text-[#0d111b] dark:text-white">Cálculo Integral</span>
                                <span class="text-xs text-[#4c5f9a] dark:text-slate-500">Ciencias Básicas</span>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center justify-center size-6 rounded bg-gray-100 dark:bg-slate-700 text-xs font-bold text-gray-700 dark:text-gray-300">2</span>
                        </td>
                        <td class="py-3 px-4 text-center text-sm text-[#0d111b] dark:text-gray-300">5</td>
                        <td class="py-3 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">1 Req</span>
                        </td>
                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-100">
                                <button class="text-primary hover:text-red-600 p-1 rounded hover:bg-blue-100 dark:hover:bg-slate-700 transition-colors" title="Editar">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </button>
                                <button class="text-red-500 hover:text-red-700 p-1 rounded hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors" title="Eliminar">
                                    <span class="material-symbols-outlined text-[18px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr> -->

                    <?php foreach($dictionary as $code => $course):?>
                        <!-- Row 2 -->
                        <tr class="group hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors border-l-4 border-l-transparent">
                            <td class="py-3 px-4">
                                <span class="font-bold text-[#0d111b] dark:text-white text-sm"><?= $course->getCodigo() ?></span>
                            </td>
                            <td class="py-3 px-4">
                                <div class="flex flex-col">
                                    <span class="text-sm font-medium text-[#0d111b] dark:text-white"><?= $course->getNombre() ?></span>
                                    <span class="text-xs text-[#4c5f9a] dark:text-slate-500">Esc. Prof. <?= $course->getEscuela() ?></span>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="inline-flex items-center justify-center size-6 rounded bg-gray-100 dark:bg-slate-700 text-xs font-bold text-gray-700 dark:text-gray-300"><?= $course->getCiclo() ?></span>
                            </td>
                            <td class="py-3 px-4 text-center text-sm text-[#0d111b] dark:text-gray-300"><?= $course->getCreditos() ?></td>
                            <td class="py-3 px-4 text-center">
                                <?php 
                                    $numPrereq = count($course->getArrayPrerequisitos()); 
                                    $colorPrereq = $numPrereq > 0 ? "green" : "yellow";
                                    $textPrereq = $numPrereq > 0 ? $numPrereq . " Req" : "none";
                                ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-<?= $colorPrereq ?>-100 text-<?= $colorPrereq ?>-800 dark:bg-<?= $colorPrereq ?>-900/30 dark:text-<?= $colorPrereq ?>-400"><?= $textPrereq = $numPrereq > 0 ? $numPrereq . " Req" : "none";?></span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <?php 
                                    $statusProf = $course->getEstadoProfesor();
                                    if($statusProf === "Asignado"){
                                        $colorProf = "green";
                                    }
                                    else if($statusProf === "Sin asignar"){
                                        $colorProf = "gray";
                                    }
                                    else if($statusProf === "Por confirmar"){
                                        $colorProf = "blue";
                                    }
                                ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-<?= $colorProf ?>-100 text-<?= $colorProf ?>-800 dark:bg-<?= $colorProf ?>-900/30 dark:text-<?= $colorProf ?>-400"><?= $statusProf ?></span>
                            </td>   
                            <td class="py-3 px-4 text-center">
                                <?php 
                                    $statusCourse = $course->getEstado();
                                    if($statusCourse === "available"){
                                        $textoStatus = "Disponible";
                                        $colorStatus = "green";
                                    }
                                    else if($statusCourse === "blocked"){
                                        $textoStatus = "Bloqueado";
                                        $colorStatus = "blue";
                                    }
                                    else if($statusCourse === "not visible"){
                                        $textoStatus = "No Visible";
                                        $colorStatus = "gray";
                                    }
                                ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-<?= $colorStatus ?>-100 text-<?= $colorStatus ?>-800 dark:bg-<?= $colorStatus ?>-900/30 dark:text-<?= $colorStatus ?>-400"><?= $textoStatus ?></span>
                            </td>   
                            <td class="py-3 px-4 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="text-[#4c5f9a] hover:text-primary p-1 rounded hover:bg-gray-100 dark:hover:bg-slate-700" title="Editar"
                                        data-codigo="<?= $course->getCodigo() ?>"
                                        data-nombre="<?= $course->getNombre() ?>"
                                        data-creditos="<?= $course->getCreditos() ?>"
                                        data-ciclo="<?= $cycle ?>"
                                        data-tipo="<?= $course->getTipo() ?>"
                                        data-prerequisitos='<?= htmlspecialchars(
                                json_encode($course->getArrayPrerequisitos(), JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8') ?>'
                                        data-estimado="<?= $course->getCantidadEstimadaAlumnos() ?>"
                                        data-costo="<?= ceil(2*($course->getCreditos()+1)*8*$FACTOR_H/$course->getCantidadEstimadaAlumnos()) ?>"
                                    >
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>
                                    <button class="text-[#4c5f9a] hover:text-red-500 p-1 rounded hover:bg-red-50 dark:hover:bg-red-900/20" title="Eliminar">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>




        <!-- Pagination -->
        <div class="p-3 border-t border-[#e7eaf3] dark:border-slate-800 flex items-center justify-between">
            <span class="text-xs text-[#4c5f9a] dark:text-slate-500">Mostrando 1-10 de 42 cursos</span>
            <div class="flex gap-2">
                <button class="p-1 rounded hover:bg-gray-100 dark:hover:bg-slate-700 text-[#4c5f9a] dark:text-slate-400 disabled:opacity-50" disabled="">
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button class="p-1 rounded hover:bg-gray-100 dark:hover:bg-slate-700 text-[#4c5f9a] dark:text-slate-400">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
            </div>
        </div>
    </aside>




    <!-- Right Column: Edit Panel -->
    <aside class="lg:col-span-5 xl:col-span-4 flex flex-col gap-4 top-24">
        <!-- Editor Card -->
        <div class="bg-white dark:bg-[#151a2d] rounded-xl shadow-lg border border-[#e7eaf3] dark:border-slate-800 flex flex-col h-auto">
            <div class="p-5 border-b border-[#e7eaf3] dark:border-slate-800 flex justify-between items-center bg-gray-50/50 dark:bg-slate-800/30 rounded-t-xl">
                <div>
                    <span class="text-xs font-bold text-primary uppercase tracking-wide">Editando</span>
                    <h3 class="font-bold text-xl text-[#0d111b] dark:text-white mt-1">Cálculo Integral</h3>
                </div>
                <div class="bg-primary/10 text-primary px-3 py-1 rounded-md text-sm font-bold border border-primary/20">BMA02</div>
            </div>
            <div class="p-5 flex-1 overflow-y-auto custom-scrollbar flex flex-col gap-6">
                <!-- Basic Info Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-2">Código</label>
                        <input class="w-full rounded-lg border border-[#cfd5e7] dark:border-slate-600 bg-[#f8f9fc] dark:bg-slate-800 text-[#0d111b] dark:text-white px-3 py-2 text-sm focus:ring-primary focus:border-primary font-medium" type="text" value="BMA02" />
                    </div>
                    <div class="col-span-1">
                        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-2">Créditos</label>
                        <input class="w-full rounded-lg border border-[#cfd5e7] dark:border-slate-600 bg-[#f8f9fc] dark:bg-slate-800 text-[#0d111b] dark:text-white px-3 py-2 text-sm focus:ring-primary focus:border-primary font-medium" type="number" value="5" />
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-2">Nombre del Curso</label>
                        <input class="w-full rounded-lg border border-[#cfd5e7] dark:border-slate-600 bg-[#f8f9fc] dark:bg-slate-800 text-[#0d111b] dark:text-white px-3 py-2 text-sm focus:ring-primary focus:border-primary font-medium" type="text" value="Cálculo Integral" />
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-[#4c5f9a] dark:text-slate-400 mb-2">Ciclo Académico</label>
                        <select class="w-full rounded-lg border border-[#cfd5e7] dark:border-slate-600 bg-[#f8f9fc] dark:bg-slate-800 text-[#0d111b] dark:text-white px-3 py-2 text-sm focus:ring-primary focus:border-primary">
                            <option value="1">Ciclo 1</option>
                            <option selected="" value="2">Ciclo 2</option>
                            <option value="3">Ciclo 3</option>
                        </select>
                    </div>
                </div>
                <!-- Prerequisites Manager -->
                <div class="flex flex-col gap-3">
                    <div class="flex justify-between items-end">
                        <label class="block text-xs font-bold text-[#0d111b] dark:text-white uppercase tracking-wide">Prerrequisitos</label>
                        <button class="text-xs text-primary hover:underline font-medium flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">add</span> Añadir
                        </button>
                    </div>
                    <!-- Search/Add Input -->
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-gray-400 text-[20px]">search</span>
                        </div>
                        <input class="block w-full pl-10 pr-3 py-2 border border-[#cfd5e7] dark:border-slate-600 rounded-lg leading-5 bg-white dark:bg-slate-800 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm" placeholder="Buscar curso para añadir..."
                        type="text" />
                    </div>
                    <!-- Added List -->
                    <div class="flex flex-wrap gap-2">
                        <div class="flex items-center gap-2 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800/50 rounded-md pl-3 pr-2 py-1.5">
                            <div class="flex flex-col leading-none">
                                <span class="text-xs font-bold text-primary">BMA01</span>
                                <span class="text-[10px] text-blue-600/70 dark:text-blue-300">Cálculo Diferencial</span>
                            </div>
                            <button class="text-blue-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-outlined text-[16px]">close</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form Actions -->
            <div class="p-4 border-t border-[#e7eaf3] dark:border-slate-800 bg-gray-50 dark:bg-slate-800/50 rounded-b-xl flex justify-end gap-3">
                <button class="px-4 py-2 text-sm font-medium text-[#4c5f9a] dark:text-slate-300 hover:text-[#0d111b] dark:hover:text-white hover:bg-white dark:hover:bg-slate-700 rounded-lg transition-colors border border-transparent hover:border-[#cfd5e7] dark:hover:border-slate-600">Cancelar</button>
                <button class="px-6 py-2 text-sm font-bold text-white bg-primary hover:bg-red-600 rounded-lg shadow-md shadow-primary/20 transition-all transform active:scale-95">Guardar Cambios</button>
            </div>
        </div>
    </aside>
</div>