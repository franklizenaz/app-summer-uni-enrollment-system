<?php
    $FACTOR_H = 60.00;
?>

<main class="flex-1 py-8 px-4 sm:px-6 lg:px-2 max-w-[1600px] mx-auto w-full">



    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 border-b border-slate-200 dark:border-slate-800 pb-6">

        <div>
            <div class="flex items-center gap-3 mb-2">
                <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">Prematrícula - Verano 2025-III</h1>
                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-bold uppercase rounded-full border border-green-200 dark:border-green-800">Abierto</span>
            </div>
            <p class="text-slate-500 dark:text-slate-400 max-w-2xl">
                Selecciona tus cursos para el próximo ciclo de nivelación académica. Verifica los requisitos y costos antes de confirmar tu matrícula.
            </p>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="bg-white dark:bg-[#1e293b] px-5 py-3 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex-1 min-w-[140px]">
                <div class="flex items-center gap-2 text-xs font-semibold uppercase text-slate-400 tracking-wider mb-1">
                    <span class="material-symbols-outlined text-sm">timeline</span>Ciclo Relativo
                </div>
                <div class="text-2xl font-bold text-slate-800 dark:text-white"><?= $_SESSION['auth']['relative_cycle_in_text'] ?></div>
            </div>
            <div class="bg-white dark:bg-[#1e293b] px-5 py-3 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex-1 min-w-[140px]">
                <div class="flex items-center gap-2 text-xs font-semibold uppercase text-slate-400 tracking-wider mb-1">
                    <span class="material-symbols-outlined text-sm">monetization_on</span>Factor H
                </div>
                <div class="text-2xl font-bold text-slate-800 dark:text-white">S/ <?= number_format($FACTOR_H, 2, '.', '');?>
                </div>
            </div>
        </div>

    </div>



    <div class="flex flex-col xl:flex-row gap-8 items-start">


        <div class="flex-1 w-full space-y-8">
            <!-- Panel de Búsqueda y Filtrado -->
            <div class="bg-white dark:bg-[#1e293b] p-4 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-wrap gap-4 items-center justify-between">
                <div class="relative w-full sm:w-80">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-shadow placeholder:text-slate-400" placeholder="Buscar curso por nombre o código..." type="text"/>
                </div>
                <option class="flex items-center gap-3 w-full sm:w-auto">
                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">Mostrar:</span>
                    <button class="px-3 py-1.5 rounded-lg bg-primary text-white text-sm font-medium shadow-sm">Todos</button>
                    <button class="px-3 py-1.5 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">Disponibles</button>
                    <button class="px-3 py-1.5 rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">Bloqueados</button>
                    <span class="text-sm font-medium text-slate-500 whitespace-nowrap">FIltrar por Ciclo:</span>
                </option>
            </div>

            <?php $repositorioCursos = new CourseRepository($_SESSION['auth']['school']) ?>





            <!-- Cursos Disponibles -->
            <section>
                <!-- Título -->
                <div class="flex items-center gap-3 mb-5">
                    <span class="material-symbols-outlined text-emerald-600 dark:text-emerald-400">check_circle</span>
                    <h2 class="text-xl font-bold text-slate-800 dark:text-white">Cursos Disponibles</h2>
                </div>

                <!-- Cursos -->
                <div class="courses-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-5 auto-rows-fr">

                    <?php 
                        $repoEnroll = new EnrollStudentsRepository();
                        $cursosMatriculados = $repoEnroll->enrolledCoursesByStudent($_SESSION['auth']['code']);
                    ?>

                    <?php foreach ($repositorioCursos->getAtributeCourses("estado","available", $_SESSION['auth']['relative_cycle_in_number']) as $cycle => $cycleCourses): ?>

                    <?php foreach ($cycleCourses as $course): ?>

                        <?php if(!in_array($course->getCodigo(), $cursosMatriculados)): ?>
                            
                        <div id="course-card-<?= $course->getCodigo() ?>" class="group bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-lg hover:border-primary/30 dark:hover:border-primary/30 transition-all duration-300 overflow-hidden flex flex-col hover:-translate-y-1 h-[370px]">

                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-bold font-mono tracking-wide border border-slate-200 dark:border-slate-700"><?= $course->getCodigo() ?></span>
                                    <div class="flex items-center gap-1.5 bg-blue-50 dark:bg-blue-900/20 px-2 py-1 rounded-full border border-blue-100 dark:border-blue-900/30">
                                        <span class="material-symbols-outlined text-[16px] text-primary dark:text-blue-300">school</span>
                                        <span class="text-xs font-bold text-primary dark:text-blue-300"><?= $course->getCreditos() ?> Cr</span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-bold line-clamp-4 min-h-[56px] text-slate-900 dark:text-white leading-snug mb-2 group-hover:text-primary transition-colors"><?= $course->getNombre() ?></h3>

                                <div class="mt-10 space-y-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                                    <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-500">Horas Semanales</span>
                                    <span class="font-medium text-slate-700 dark:text-slate-300"><?= 2*($course->getCreditos()+1) ?> Hrs</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                    <span class="text-slate-500 text-sm">Costo Estimado</span>
                                    <span class="font-extrabold text-slate-900 dark:text-white text-base">S/ <?= number_format(ceil(2*($course->getCreditos()+1)*8*$FACTOR_H/$course->getCantidadEstimadaAlumnos()), 2, '.', '') ?></span>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="p-4 bg-slate-50 dark:bg-[#162032] border-t border-slate-200 dark:border-slate-800">
                            <button id="open-button-modal-<?= $course->getCodigo() ?>"  class="w-full py-2.5 px-4 bg-primary hover:bg-[#880101c1] text-white text-sm font-bold rounded-xl shadow-sm shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 open-enroll-course-modal"
                                data-codigo="<?= $course->getCodigo() ?>"
                                data-nombre="<?= $course->getNombre() ?>"
                                data-creditos="<?= $course->getCreditos() ?>"
                                data-ciclo="<?= $cycle ?>"
                                data-tipo="<?= $course->getTipo() ?>"
                                data-prerequisitos='<?= htmlspecialchars(
                        json_encode($course->getArrayPrerequisitos(), JSON_UNESCAPED_UNICODE),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>'
                                data-estimado="<?= $course->getCantidadEstimadaAlumnos() ?>"
                                data-costo="<?= ceil(2*($course->getCreditos()+1)*8*$FACTOR_H/$course->getCantidadEstimadaAlumnos()) ?>"
                            >
                                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                            </button> 


                            </div>

                        </div>

                        <?php endif ?>
                        <?php if(in_array($course->getCodigo(), $cursosMatriculados)): ?>

                        <div class="bg-green-50 dark:bg-[#131b2a] rounded-2xl border border-green-200 dark:border-green-800 opacity-90 flex flex-col h-full grayscale-[0.5] hover:grayscale-0 transition-all">

                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-2.5 py-1 rounded-md bg-green-200/50 dark:bg-green-800 text-green-500 text-xs font-bold font-mono tracking-wide"><?= $course->getCodigo() ?></span>
                                    <span class="material-symbols-outlined text-green-400">lock</span>
                                </div>
                                <h3 class="text-lg font-bold text-green-600 dark:text-green-400 leading-snug mb-3"><?= $course->getNombre() ?></h3>

                                <div class="mt-auto bg-green-200/50 dark:bg-green-800/50 p-3 rounded-lg border border-green-200 dark:border-green-700 flex gap-3 items-center">
                                    <span class="material-symbols-outlined text-green-500 text-lg mt-0.5">check_circle</span>
                                    <div class="text-xs">
                                        <p class="font-bold text-green-600 dark:text-green-400 mb-0.5">Ya estás matriculado</p>
                                    </div>
                                </div>

                            </div>

                            <div class="p-4 border-t border-green-200 dark:border-green-800">
                                <button class="w-full py-2.5 px-4 bg-green-200 dark:bg-green-800/50 text-green-400 font-medium text-sm rounded-xl cursor-not-allowed flex items-center justify-center gap-2" disabled="">
                                    <span>No Disponible</span>
                                </button>
                            </div>

                        </div>
                        <?php endif ?>

                    <?php endforeach; ?>

                    <?php endforeach; ?>


                </div>

            </section>
            
            <!-- Cursos No Disponibles -->

            <section class="pt-4">
            <div class="flex items-center gap-3 mb-5">
            <span class="material-symbols-outlined text-slate-400">lock</span>
            <h2 class="text-xl font-bold text-slate-500 dark:text-slate-400">Cursos Bloqueados</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-5">

                <?php foreach ($repositorioCursos->getAtributeCourses("estado","available", $_SESSION['auth']['relative_cycle_in_number'], ">") as $cycle => $cycleCourses): ?>

                <?php foreach ($cycleCourses as $course): ?>
                <div class="bg-slate-50 dark:bg-[#131b2a] rounded-2xl border border-slate-200 dark:border-slate-800 opacity-90 flex flex-col h-full grayscale-[0.5] hover:grayscale-0 transition-all">

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-200/50 dark:bg-slate-800 text-slate-500 text-xs font-bold font-mono tracking-wide"><?= $course->getCodigo() ?></span>
                            <span class="material-symbols-outlined text-slate-400">lock</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-600 dark:text-slate-400 leading-snug mb-3"><?= $course->getNombre() ?></h3>

                        <div class="mt-auto bg-slate-200/50 dark:bg-slate-800/50 p-3 rounded-lg border border-slate-200 dark:border-slate-700 flex gap-3 items-start">
                            <span class="material-symbols-outlined text-slate-500 text-lg mt-0.5">schedule</span>
                            <div class="text-xs">
                                <p class="font-bold text-slate-600 dark:text-slate-400 mb-0.5">Ciclo Superior</p>
                                <p class="text-slate-500 dark:text-slate-500">Pertenece al Ciclo <?= $course->getCiclo() ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                        <button class="w-full py-2.5 px-4 bg-slate-200 dark:bg-slate-800/50 text-slate-400 font-medium text-sm rounded-xl cursor-not-allowed flex items-center justify-center gap-2" disabled="">
                            <span>No Disponible</span>
                        </button>
                    </div>

                </div>

                <?php endforeach; ?>

                <?php endforeach; ?>


                <?php foreach ($repositorioCursos->getAtributeCourses("estado","blocked") as $cycle => $cycleCourses): ?>

                <?php foreach ($cycleCourses as $course): ?>

                <div class="bg-slate-50 dark:bg-[#131b2a] rounded-2xl border border-slate-200 dark:border-slate-800 opacity-90 flex flex-col h-full grayscale-[0.5] hover:grayscale-0 transition-all">

                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-200/50 dark:bg-slate-800 text-slate-500 text-xs font-bold font-mono tracking-wide"><?= $course->getCodigo() ?></span>
                            <span class="material-symbols-outlined text-slate-400">lock</span>
                        </div>
                        <h3 class="text-lg font-bold text-slate-600 dark:text-slate-400 leading-snug mb-3"><?= $course->getNombre() ?></h3>

                        <div class="mt-auto bg-red-50 dark:bg-red-900/10 p-3 rounded-lg border border-red-100 dark:border-red-900/30 flex gap-3 items-start">
                            <span class="material-symbols-outlined text-red-500 text-lg mt-0.5">error_outline</span>
                            <div class="text-xs">
                                <p class="font-bold text-red-700 dark:text-red-400 mb-0.5">Curso No Disponible</p>
                                <p class="text-red-600/80 dark:text-red-400/80">No alcanzó las pre-matrículas necesarias</p>
                            </div>
                        </div>

                    </div>

                    <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                        <button class="w-full py-2.5 px-4 bg-slate-200 dark:bg-slate-800/50 text-slate-400 font-medium text-sm rounded-xl cursor-not-allowed flex items-center justify-center gap-2" disabled="">
                            <span>No Disponible</span>
                        </button>
                    </div>

                </div>

                <?php endforeach; ?>

                <?php endforeach; ?>

            </div>

            </section>


        </div>
        

        <aside class="w-full xl:w-96 shrink-0 space-y-6 xl:sticky xl:top-24">
            
            <div class="bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200 dark:border-slate-700 shadow-xl shadow-slate-200/50 dark:shadow-black/20 overflow-hidden flex flex-col">

                <div class="p-6 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/50">
                <h3 class="font-bold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                <span class="material-symbols-outlined text-primary dark:text-white">shopping_bag</span>
                                        Resumen de Matrícula
                                    </h3>
                <p class="text-xs text-slate-500 mt-1">Cursos seleccionados para el ciclo 2025-III.</p>
                </div>
                
                <!-- Contenedor de Colección de cursos por matricular -->
                <div id="summaryCollection" class="p-4 space-y-3 min-h-[100px]"></div>

                <form action="/ajax/enroll" method="post" class="p-6 bg-slate-50 dark:bg-[#162032] border-t border-slate-100 dark:border-slate-800">
                    <div class="space-y-4 mb-6">
                        <div class="space-y-2">
                        <div class="flex justify-between text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <span>Cursos</span>
                        <span class="flex"><div id="summary-count">0</div> / 2 Máx</span>
                        </div>

                        <div class="h-2 w-full bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                            <div id="summary-bar" class="h-full bg-primary rounded-full" style="width: 0%"></div>
                        </div>

                        </div>
                        <div class="flex justify-between items-end pt-4 border-t border-slate-200 dark:border-slate-700 border-dashed">
                        <div class="flex flex-col">
                        <span class="text-sm font-medium text-slate-600 dark:text-slate-400">Total Estimado</span>
                        <span class="text-[10px] text-slate-400 font-mono">Factor H: <?= number_format($FACTOR_H, 2, '.', '');?></span>
                        </div>
                        <span class="flex text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight">S/ <div id="summary-cash" data-saldo="<?= (int) 0 ?>">00.00</div></span>
                        </div>
                    </div>

                    <input type="hidden" name="courses" id="courses-input">
                    <button id="process-enroll" class="w-full py-3.5 px-4 bg-primary hover:bg-[#880101c1] text-white font-bold rounded-xl shadow-lg shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 mb-3" type="button">
                    <span>Procesar Matrícula</span>
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                    <p class="text-center text-[10px] text-slate-400 max-w-[250px] mx-auto leading-relaxed">
                        Al confirmar tu matrícula se te registrará oficialmente en la lista del curso seleccionado.
                    </p>
                </form>

            </div>

            <!-- Ver Reglamento -->
            <div class="bg-indigo-50 dark:bg-indigo-900/10 border border-indigo-100 dark:border-indigo-800/30 p-4 rounded-2xl flex gap-3">
                <span class="material-symbols-outlined text-indigo-600 dark:text-indigo-400 mt-0.5">contact_support</span>
                <div>
                <h4 class="font-bold text-indigo-900 dark:text-indigo-200 text-sm mb-1">Centro de Ayuda</h4>
                <p class="text-xs text-indigo-700 dark:text-indigo-300/80 leading-relaxed mb-2">
                                        ¿Problemas con tus requisitos? Revisa el reglamento de matrícula vigente.
                                    </p>
                <a class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline inline-flex items-center gap-1" href="#">
                                        Ver Reglamento <span class="material-symbols-outlined text-[10px]">open_in_new</span>
                </a>
                </div>
            </div>

        </aside>


    </div>


    
</main>

            

<!-- Overlay -->
<div id="courseOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-10"></div>

<!-- Enroll  Modal -->
<div id="courseModal" class="fixed inset-0 flex items-center justify-center hidden z-20">
    <div class="relative bg-white dark:bg-surface-dark w-full max-w-md rounded-2xl shadow-2xl border border-slate-100 dark:border-slate-700 overflow-hidden animate-pop-in mx-4">

        <div class="h-2 bg-primary"></div>

        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span id="modalCodigo" class="bg-primary text-white text-xs font-bold px-2 py-0.5 rounded-full">---</span>
                        <div class="text-xs font-semibold text-slate-400 uppercase">Ciclo 
                            <span id="modalCiclo"></span>
                        </div>
                    </div>
                    <h2 id="modalNombre" class="text-xl font-bold text-slate-900 dark:text-white">---</h2>
                </div>
                <button id="closeModal">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-xs text-slate-500">Créditos</span>  
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-primary">token</span>
                        <div class="font-bold" id="modalCreditos"></div>
                    </div>
                </div>
                <div class="bg-slate-50 p-3 rounded-xl">
                    <span class="text-xs text-slate-500">Tipo</span>        
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px] text-purple-500">category</span>
                        <div class="font-bold" id="modalTipo"></div>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200 dark:border-slate-700 my-5"></div>

            <!-- Prerrequisitos -->
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3 flex items-center gap-2">
            <span class="material-symbols-outlined text-[14px]">account_tree</span>Prerrequisitos</h4>
            <div id="modalPrerequisitos" class="space-y-2"></div>

            <div class="flex gap-3 mt-5">
                <button id="enrollButton" class="flex-1 py-2.5 bg-primary text-white rounded-xl text-sm font-bold"
                    data-codigo=""
                    data-nombre=""
                    data-creditos=""
                    data-ciclo=""
                    data-tipo=""
                    data-prerequisitos=''
                    data-estimado=""
                    data-costo=""
                >
                    Añadir Matrícula
                </button>
            </div>

        </div>
    </div>
</div>

<style>
    @keyframes pop-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-pop-in {
        animation: pop-in 0.25s ease-out;
    }

</style>


<script>




document.querySelector('#process-enroll').addEventListener('click', (e) => {
    e.preventDefault();

    const courses = [];

    document.querySelectorAll('#summaryCollection [id^="summary-card-"]').forEach(card => {
        const codigo = card.id.replace('summary-card-', '');
        courses.push(codigo);
    });

    if (courses.length === 0) {
        alert('No has seleccionado cursos');
        return;
    }

    if (courses.length > 2) {
        alert('Máximo 2 cursos');
        return;
    }

    document.querySelector('#courses-input').value = JSON.stringify(courses);
    e.target.closest('form').submit();
});






//OPEN MODAL
document.querySelectorAll('.open-enroll-course-modal').forEach(button => {
    addOpenModalFunction(button)
});







document.getElementById('closeModal').addEventListener('click', closeModal);
document.getElementById('courseOverlay').addEventListener('click', closeModal);

function closeModal() {
    document.getElementById('courseOverlay').classList.add('hidden');
    document.getElementById('courseModal').classList.add('hidden');
}



// Funcionalidad para añadir curso desde modal al Resumen
document.querySelector('#enrollButton').addEventListener('click', () => {
    const resumenContainer = document.querySelector('#summaryCollection');
    const maxCursos = 2;

    // Contar cursos actualmente en el Resumen
    const cursosActuales = resumenContainer.children.length;
    if (cursosActuales >= maxCursos) {
        alert('Solo puedes seleccionar un máximo de 2 cursos.');
        return;
    }

    // Obtener datos del modal
    const button = document.getElementById("enrollButton")

    const codigo = button.dataset.codigo;
    const nombre = button.dataset.nombre;
    const creditos = button.dataset.creditos;
    const ciclo = button.dataset.ciclo;
    const tipo = button.dataset.tipo;
    const jsonPr = button.dataset.prerequisitos;

    const estimado = button.dataset.estimado;
    const costo = Number(button.dataset.costo);
    

    console.log(jsonPr);
    // Crear el bloque del curso en el Resumen
    const cursoHTML = document.createElement('div');
    cursoHTML.id = `summary-card-${codigo}`;
    cursoHTML.className = 'enroll-card group flex gap-3 p-3 rounded-xl border border-slate-100 dark:border-slate-700 bg-white dark:bg-slate-800/50 hover:border-blue-200 dark:hover:border-blue-800 transition-colors';
    cursoHTML.innerHTML = `
        <div class="flex flex-col items-center justify-center w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-primary dark:text-blue-300 font-bold text-xs">
            ${creditos} Cr
        </div>
        <div class="flex-1 min-w-0">
            <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200 truncate">${nombre}</h4>
            <p class="text-xs text-slate-500">${codigo} • Obligatorio</p>
        </div>
        <div class="text-right flex flex-col items-end">
            <p class="text-xs font-bold text-slate-700 dark:text-slate-300">S/ ${Math.ceil(costo).toFixed(2)}</p>
            <button class="text-slate-400 hover:text-red-500 transition-colors mt-1 remove-course-from-summary" 
                    data-codigo="${codigo}"
                    data-nombre="${nombre}"
                    data-creditos="${creditos}"
                    data-ciclo="${ciclo}"
                    data-tipo="${tipo}"
                    data-prerequisitos='${jsonPr}'
                    data-estimado="${estimado}"
                    data-costo="${costo}"
                >
                <span class="material-symbols-outlined text-base">delete</span>
            </button>
        </div>
    `;

    resumenContainer.appendChild(cursoHTML);

    // Cerrar modal
    closeModal();

    // Actualizar el estilo del curso en la lista de cursos disponibles
    marcarCursoComoSeleccionado(
        codigo,
        nombre,
        creditos,
        costo,
        ciclo,
        tipo,
        jsonPr,
        estimado
    );

    addRemoveFunction(  cursoHTML,
                        codigo,
                        nombre,
                        creditos,
                        costo,
                        ciclo,
                        tipo,
                        jsonPr,
                        estimado
                    );

    refreshBarFunction();
    refreshCash("add",costo);

});



function marcarCursoComoSeleccionado(codigo, nombre, creditos, costo, ciclo, tipo, jsonPr, estimado) {

    const card = document.querySelector(`#course-card-${codigo}`);
    if (!card) return;

    card.className = `
        group bg-white dark:bg-[#1e293b]
        rounded-2xl border-2 border-green-500 dark:border-green-600
        shadow-md overflow-hidden flex flex-col h-full relative
    `;

    card.innerHTML = cardPreseleccionadoHTML({
        codigo,
        nombre,
        creditos,
        costo,
        ciclo,
        tipo,
        jsonPr,
        estimado
    });

    addRemoveFunction(  card,
                        codigo,
                        nombre,
                        creditos,
                        costo,
                        ciclo,
                        tipo,
                        jsonPr,
                        estimado
                    );
}


function AnularCursoComoSeleccionado(codigo, nombre, creditos, costo, ciclo, tipo, jsonPr, estimado) {

    const card = document.querySelector(`#course-card-${codigo}`);
    if (!card) return;

    card.className = `
        group bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-lg hover:border-primary/30 dark:hover:border-primary/30 transition-all duration-300 overflow-hidden flex flex-col hover:-translate-y-1 h-[370px]
    `;

    card.innerHTML = cardOriginalHTML({
        codigo,
        nombre,
        creditos,
        costo,
        ciclo,
        tipo,
        jsonPr,
        estimado
    });

    const boton = document.querySelector(`#open-button-modal-${codigo}`);
    addOpenModalFunction(boton);
}


function cardPreseleccionadoHTML({ codigo, nombre, creditos, costo, ciclo, tipo, jsonPr, estimado}) {
    return `
        <div class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 rounded-bl-lg">
            <span class="material-symbols-outlined text-sm">check</span>
        </div>
        <div class="p-5 flex-1 flex flex-col">
            <div class="flex justify-between items-start mb-4">
                <span class="px-2.5 py-1 rounded-md bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-300 text-xs font-bold font-mono tracking-wide border border-green-100 dark:border-green-900/50">${codigo}</span>
                <div class="flex items-center gap-1.5 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full border border-green-100 dark:border-green-900/50">
                    <span class="material-symbols-outlined text-[16px] text-green-600 dark:text-green-400">school</span>
                    <span class="text-xs font-bold text-green-600 dark:text-green-400">${creditos} Cr</span>
                </div>
            </div>
            <h3 class="text-lg font-bold text-slate-900 dark:text-white leading-snug mb-2">${nombre}</h3>
            <div class="mt-auto pt-4 border-t border-dashed border-slate-200 dark:border-slate-700">
                <div class="bg-green-50 dark:bg-green-900/10 p-2 rounded-lg text-center mb-2">
                    <p class="text-xs font-bold text-green-700 dark:text-green-400">¡Curso Pre-seleccionado!</p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-slate-500 text-sm">Costo</span>
                    <span class="font-extrabold text-slate-900 dark:text-white text-base">S/ ${Math.ceil(costo).toFixed(2)}</span>
                </div>
            </div>
        </div>
        <div class="p-4 bg-slate-50 dark:bg-[#162032] border-t border-slate-200 dark:border-slate-800">
            <button class="w-full py-2.5 px-4 bg-white dark:bg-transparent border border-slate-300 dark:border-slate-600 hover:bg-red-50 dark:hover:bg-red-900/20 hover:border-red-300 hover:text-red-600 text-slate-500 text-sm font-bold rounded-xl transition-all active:scale-[0.98] flex items-center justify-center gap-2 remove-course-from-summary" 
                    data-codigo="${codigo}"
                    data-nombre="${nombre}"
                    data-creditos="${creditos}"
                    data-ciclo="${ciclo}"
                    data-tipo="${tipo}"
                    data-prerequisitos='${jsonPr}'
                    data-estimado="${estimado}"
                    data-costo="${costo}"
            >
        <span>Remover</span>
        <span class="material-symbols-outlined text-[18px]">remove_circle</span>
        </button>
        </div>`;
}

function cardOriginalHTML({ codigo, nombre, creditos, costo, ciclo, tipo, jsonPr, estimado}) {
    return `
            <div id="course-card-${codigo}" class="group bg-white dark:bg-[#1e293b] rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-lg hover:border-primary/30 dark:hover:border-primary/30 transition-all duration-300 overflow-hidden flex flex-col hover:-translate-y-1 h-[370px]">

            <div class="p-5 flex-1 flex flex-col">
                <div class="flex justify-between items-start mb-4">
                <span class="px-2.5 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-bold font-mono tracking-wide border border-slate-200 dark:border-slate-700">${codigo}</span>
                <div class="flex items-center gap-1.5 bg-blue-50 dark:bg-blue-900/20 px-2 py-1 rounded-full border border-blue-100 dark:border-blue-900/30">
                    <span class="material-symbols-outlined text-[16px] text-primary dark:text-blue-300">school</span>
                    <span class="text-xs font-bold text-primary dark:text-blue-300">${creditos} Cr</span>
                </div>
                </div>
                <h3 class="text-lg font-bold line-clamp-4 min-h-[56px] text-slate-900 dark:text-white leading-snug mb-2 group-hover:text-primary transition-colors">${nombre}</h3>

                <div class="mt-10 space-y-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-slate-500">Horas Semanales</span>
                    <span class="font-medium text-slate-700 dark:text-slate-300">${2*(Number(creditos) + 1)} Hrs</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-slate-500 text-sm">Costo Estimado</span>
                    <span class="font-extrabold text-slate-900 dark:text-white text-base">S/ ${Math.ceil(costo).toFixed(2)}</span>
                </div>
                </div>

            </div>

            <div class="p-4 bg-slate-50 dark:bg-[#162032] border-t border-slate-200 dark:border-slate-800">
                <button id="open-button-modal-${codigo}" class="w-full py-2.5 px-4 bg-primary hover:bg-[#880101c1] text-white text-sm font-bold rounded-xl shadow-sm shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 open-enroll-course-modal" data-codigo="${codigo}" data-nombre="${nombre}" data-creditos="${creditos}" data-ciclo="${ciclo}" data-tipo="${tipo}" data-prerequisitos='${jsonPr}' data-estimado="${estimado}" data-costo="${costo}">
                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                </button>

            </div>

            </div>`;
}





function addRemoveFunction(container,
                            codigo,
                            nombre,
                            creditos,
                            costo,
                            ciclo,
                            tipo,
                            jsonPr,
                            estimado
                    ) {
    // Agregar funcionalidad al botón de remover
    container.querySelector('.remove-course-from-summary').addEventListener('click', () => {
    const summary = document.querySelector(`#summary-card-${codigo}`);
    if (summary) summary.remove();

    AnularCursoComoSeleccionado(
        codigo,
        nombre,
        creditos,
        costo,
        ciclo,
        tipo,
        jsonPr,
        estimado
    );

    refreshBarFunction()
    refreshCash("remove",costo);

    });
}

function refreshBarFunction(){
    const container = document.getElementById('summaryCollection');
    const numeroCursos = container.children.length;
    const barra = document.querySelector('#summary-bar');
    const cuenta = document.querySelector('#summary-count');
    cuenta.innerHTML =numeroCursos;

    const porcentaje = numeroCursos/2 * 100;
    barra.style = `width: ${porcentaje}%`;
}

function refreshCash(accion, costo){
        //Actualizamos porcentaje en barra
    const cash = document.querySelector('#summary-cash')
    let saldo = Number(cash.dataset.saldo);

    if (accion === "add"){
         saldo += Number(costo);
    }
    if (accion === "remove"){
        saldo -= Number(costo);
    }

    cash.dataset.saldo = Number(saldo)
    cash.innerHTML = Math.ceil(saldo).toFixed(2)
}

function addOpenModalFunction(button){

    button.addEventListener('click', () => {
        const codigo = button.dataset.codigo;
        const nombre = button.dataset.nombre;
        const creditos = button.dataset.creditos;
        const ciclo = button.dataset.ciclo;
        const tipo = button.dataset.tipo.charAt(0).toUpperCase() + button.dataset.tipo.slice(1).toLowerCase();
        const jsonPr = button.dataset.prerequisitos;
        const estimado = button.dataset.estimado;
        const costo = button.dataset.costo;

        document.getElementById('modalCodigo').textContent = codigo
        document.getElementById('modalNombre').textContent = nombre
        document.getElementById('modalCreditos').textContent = creditos
        document.getElementById('modalCiclo').textContent = ciclo
        document.getElementById('modalTipo').textContent = tipo

        const enrollButton = document.getElementById("enrollButton")
        enrollButton.dataset.codigo = codigo;
        enrollButton.dataset.nombre = nombre;
        enrollButton.dataset.creditos = creditos;
        enrollButton.dataset.ciclo = ciclo;
        enrollButton.dataset.tipo = tipo;
        enrollButton.dataset.prerequisitos = jsonPr;
        enrollButton.dataset.estimado = estimado;
        enrollButton.dataset.costo = costo;

        document.getElementById('courseOverlay').classList.remove('hidden');
        document.getElementById('courseModal').classList.remove('hidden');

        const container = document.getElementById('modalPrerequisitos');
        container.innerHTML = '';

        let prerequisitos = [];

        try {
            prerequisitos = JSON.parse(button.dataset.prerequisitos);
        } catch (e) {
            console.error('Error parseando prerrequisitos', e);
        }

        if (!prerequisitos || prerequisitos.length === 0) {
            container.innerHTML = `
                <span class="text-sm text-slate-400 italic">
                    No tiene prerrequisitos
                </span>`;
            return;
        }

        prerequisitos.forEach(pr => {

            // const aprobado = Boolean(pr.aprobado);
            const aprobado = true;

            container.innerHTML += `
                <div class="flex items-center gap-2 px-3 py-1.5 border rounded-lg
                    ${aprobado
                        ? 'bg-emerald-50 dark:bg-emerald-900/20 border-emerald-200 dark:border-emerald-800/30'
                        : 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800/30'}">

                    <span class="w-2 h-2 rounded-full
                        ${aprobado ? 'bg-emerald-500' : 'bg-red-500'}"></span>

                    <span class="text-sm font-medium
                        ${aprobado
                            ? 'text-emerald-800 dark:text-emerald-300'
                            : 'text-red-800 dark:text-red-300'}">
                        ${pr.codigo} - ${pr.nombre}
                    </span>

                    <span class="material-symbols-outlined text-[16px]
                        ${aprobado ? 'text-emerald-600' : 'text-red-600'}">
                        ${aprobado ? 'check' : 'close'}
                    </span>
                </div>
            `;
        });

    });
}



</script>

