<?php
    $FACTOR_H = 65.00;
?>

<div class="max-w-6xl mx-auto mt-[50px] flex flex-col gap-6">
<!-- PageHeading -->
    <div class="flex flex-wrap justify-between items-end gap-4">

        <div class="flex flex-col gap-1">
            <h2 class="text-slate-900 dark:text-white text-3xl md:text-4xl font-black tracking-tight">Mis Cursos</h2>
            <p class="text-primary text-base font-medium">Ciclo Verano 2025</p>
        </div>

        <!-- <div class="flex gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-bold text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-700 transition shadow-sm">
            <span class="material-symbols-outlined text-[20px]">print</span>
            Constancia de Matrícula
            </button>
        </div> -->

    </div>
    <!-- Stats & Search Row -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
    <!-- Stats -->
    <div class="md:col-span-12 lg:col-span-7 flex flex-wrap gap-4">
    <div class="flex-1 min-w-[140px] bg-white dark:bg-slate-800 rounded-xl p-5 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col justify-between relative overflow-hidden group">
    <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
    <span class="material-symbols-outlined text-6xl text-primary">school</span>
    </div>

    <?php $creditosTotales = 0; $monto = 0;

        $repositorioCursos = new CourseRepository($_SESSION['auth']['school']);

        foreach ($repositorioCursos->getEnrolledCourses($_SESSION['auth']['code']) as $course){
            $creditosTotales += $course->getCreditos();
            $monto += ceil(2*($course->getCreditos()+1)*8*$FACTOR_H/$course->getCantidadEstimadaAlumnos());
        }    
    ?>

    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium z-10">Total Créditos</p>
    <p class="text-slate-900 dark:text-white text-3xl font-bold mt-1 z-10"><?= $creditosTotales ?></p>
    </div>
    <div class="flex-1 min-w-[140px] bg-white dark:bg-slate-800 rounded-xl p-5 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col justify-between relative overflow-hidden group">
    <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
    <span class="material-symbols-outlined text-6xl text-green-600">payments</span>
    </div>
    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium z-10">Costo Total</p>
    <p class="text-slate-900 dark:text-white text-3xl font-bold mt-1 z-10">S/.  <?= number_format($monto, 2, '.', '') ?></p>
    </div>
    <div class="flex-1 min-w-[140px] bg-white dark:bg-slate-800 rounded-xl p-5 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col justify-between relative overflow-hidden group">
    <div class="absolute right-0 top-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
    <span class="material-symbols-outlined text-6xl text-blue-400">calendar_month</span>
    </div>
    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium z-10">Inicio de Clases</p>
    <p class="text-slate-900 dark:text-white text-3xl font-bold mt-1 z-10">12 Ene</p>
    </div>
    </div>
    </div>
    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-6 pb-10">


        <?php foreach ($repositorioCursos->getEnrolledCourses($_SESSION['auth']['code']) as $course): ?>

        <!-- Course Card 1 -->
        <div class="bg-white dark:bg-slate-800 rounded-xl p-6 border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col gap-4 hover:shadow-md transition-shadow group/card">

            <div class="flex justify-between items-start">
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-200"><?= $course->getCodigo() ?></span>
                    <span class="text-xs font-semibold text-slate-400 uppercase">Ciclo <?= $course->getCiclo() ?> </span>
                </div>
            <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-2 group-hover/card:text-primary transition-colors cursor-pointer"><?= $course->getNombre() ?></h3>
            </div>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-<?= ucfirst($course->getTipo()) === 'Obligatorio' ? 'green' : 'blue' ?>-100 text-<?= ucfirst($course->getTipo()) === 'Obligatorio' ? 'green' : 'blue' ?>-800 dark:bg-<?= ucfirst($course->getTipo()) === 'Obligatorio' ? 'green' : 'blue' ?>-900/50 dark:text-<?= ucfirst($course->getTipo()) === 'Obligatorio' ? 'green' : 'blue' ?>-200"><?= ucfirst($course->getTipo()) ?></span>
            </div>
            <div class="grid grid-cols-2 gap-y-3 gap-x-2 text-sm mt-2">
                <div class="flex items-start gap-2 col-span-2">
                    <span class="material-symbols-outlined text-slate-400 text-[20px] shrink-0">person</span>
                    <span class="text-slate-700 dark:text-slate-300 font-medium">Prof. —</span>
                </div>
                <!-- <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 text-[20px] shrink-0">schedule</span>
                    <span class="text-slate-700 dark:text-slate-300">Lu/Mi 16-18h</span>
                </div> -->
                <!-- <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 text-[20px] shrink-0">location_on</span>
                    <span class="text-slate-700 dark:text-slate-300">Lab CC-2</span>
                </div> -->
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 text-[20px] shrink-0">school</span>
                    <span class="text-slate-700 dark:text-slate-300"><?= $course->getCreditos() ?> Créditos</span>
                </div>
                <!-- <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 text-[20px] shrink-0">groups</span>
                    <span class="text-slate-700 dark:text-slate-300">Sec. A</span>
                </div> -->
            </div>

            <div class="pt-4 mt-auto border-t border-slate-100 dark:border-slate-700 flex gap-3 items-center">
            <button class="w-full py-2.5 px-4 bg-primary/10 text-primary text-sm hover:bg-primary/20 font-bold rounded-xl shadow-sm shadow-primary/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 open-cancel-enroll-course-modal"
                data-codigo="<?= $course->getCodigo() ?>"
                data-nombre="<?= $course->getNombre() ?>"
                data-creditos="<?= $course->getCreditos() ?>"
                data-ciclo="<?= $course->getCiclo() ?>"
            >
                Anular Matrícula
                <span class="material-symbols-outlined text-[18px]">sprint</span>
            </button>
            <!-- <button class="flex-1 px-4 py-2 bg-primary/10 text-primary dark:text-blue-300 dark:bg-primary/20 rounded-lg text-sm font-bold hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors flex items-center justify-center gap-1">
                                                Detalles
                                                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </button> -->
            </div>

        </div>
        <?php endforeach; ?>

    </div>
</div>


<!-- Hidden Modal Code (Simulated Structure) -->

<!-- To see this, remove the 'hidden' class from the div below -->
<div id="courseModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 hidden">

  <!-- Backdrop -->
  <div id="courseOverlay" class="absolute inset-0 bg-[#0d111b]/60 backdrop-blur-sm transition-opacity"></div>

  <!-- Modal Panel -->
  <div class="pop-in animate-pop-in relative w-full max-w-xl transform overflow-hidden rounded-2xl bg-white dark:bg-[#151a29] text-left shadow-2xl transition-all flex flex-col max-h-[90vh]">

    <!-- Modal Header -->
    <div class="flex items-center justify-between border-b border-border-light dark:border-border-dark px-6 py-5">
      <h2 class="text-xl font-bold tracking-tight text-text-main dark:text-white flex items-center gap-2">
        <span class="material-symbols-outlined text-primary">block</span>
        Anular Matrícula
      </h2>
      <button id="closeModal" class="rounded-full p-1 text-text-secondary hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400 transition-colors" type="button">
        <span class="sr-only">Cerrar</span>
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <!-- Modal Content (Scrollable) -->
    <div class="flex-1 overflow-y-auto p-6 scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600">
      <!-- Student Details (Modified DescriptionList) -->
      <div class="mb-6 rounded-xl bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark p-4">
        <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 items-center">
          <div class="h-10 w-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">person</span>
          </div>
          <div>
            <p class="text-sm font-medium text-text-secondary dark:text-gray-400">Alumno</p>
            <p class="text-base font-semibold text-text-main dark:text-white"><?= $_SESSION['auth']['name'] ?></p>
          </div>
          <div class="col-start-2 border-t border-border-light dark:border-gray-700 mt-2 pt-2 grid grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-text-secondary dark:text-gray-400">Código</p>
              <p class="text-sm font-medium text-text-main dark:text-gray-200"><?= $_SESSION['auth']['code'] ?></p>
            </div>
            <div>
              <p class="text-xs text-text-secondary dark:text-gray-400">Escuela Profesional</p>
              <p class="text-sm font-medium text-text-main dark:text-gray-200"><?= $_SESSION['auth']['school'] === 'Estadística' ? 'EPIES' : 'EPIEC' ?></p>
            </div>
          </div>
        </div>
      </div>
      <!-- Course to Cancel (ListItem) -->
      <div class="mb-6">
        <p class="mb-2 text-sm font-medium text-text-secondary dark:text-gray-400">Curso a anular</p>
        <div class="flex items-center gap-4 rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-[#1a202e] p-4 shadow-sm">
          <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg bg-[#e7eaf3] dark:bg-gray-700 text-text-main dark:text-white">
            <span class="material-symbols-outlined">menu_book</span>
          </div>
          <div class="flex-1 min-w-0">
            <p class="text-base font-semibold text-text-main dark:text-white truncate">
              <span id="modalCodigo"></span> - <span id="modalNombre"></span>
            </p>
            <p class="text-sm text-text-secondary dark:text-gray-400"><span id="modalCiclo"></span>| Créditos <span id="modalCreditos"></span></p>
          </div>
          <div class="shrink-0">
            <span class="inline-flex items-center rounded-full bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 dark:bg-red-900/30 dark:text-red-400">
              Eliminando
            </span>
          </div>
        </div>
      </div>
      <!-- Warning Panel (ActionPanel Adaptation) -->
      <div class="mb-6 rounded-lg border border-amber-200 bg-amber-50 dark:bg-amber-900/10 dark:border-amber-900/30 p-4">
        <div class="flex gap-3">
          <div class="shrink-0 text-amber-600 dark:text-amber-500">
            <span class="material-symbols-outlined">warning</span>
          </div>
          <div>
            <h3 class="text-sm font-bold text-amber-900 dark:text-amber-400">Advertencia</h3>
            <p class="mt-1 text-sm text-amber-800 dark:text-amber-300/80 leading-relaxed">
              Esta acción liberará el cupo y anulará los costos asociados. El alumno perderá su vacante en esta sección. <strong>Esta acción no se puede deshacer.</strong>
            </p>
          </div>
        </div>
      </div>

    </div>

    <!-- Modal Footer -->
    <form id="void-form" action="/ajax/void" method="post" class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 border-t border-border-light dark:border-border-dark bg-background-light dark:bg-[#1a202e] px-6 py-4">
      <input type="hidden" id="input-codigo" name="code">
      <button id="closeModa2" class="w-full sm:w-auto inline-flex justify-center items-center rounded-lg border border-border-light dark:border-border-dark bg-white dark:bg-[#151a29] px-4 py-2.5 text-sm font-medium text-text-main dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-colors" type="button">
        Cancelar
      </button>
      <button id="void-button" class="w-full sm:w-auto inline-flex justify-center items-center rounded-lg bg-primary px-4 py-2.5 text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-offset-[#151a29] transition-colors shadow-sm" type="submit">
        <span class="material-symbols-outlined text-[18px] mr-2">check_circle</span> Confirmar Anulación
      </button>
    </form>

  </div>

</div><style>
    @keyframes pop-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-pop-in {
        animation: pop-in 0.25s ease-out;
    }

</style>


<script>
let codigoCurso = null;

document.querySelectorAll('.open-cancel-enroll-course-modal').forEach(button => {
    button.addEventListener('click', () => {

        codigoCurso = button.dataset.codigo;

        document.getElementById('modalCodigo').textContent = button.dataset.codigo;
        document.getElementById('modalNombre').textContent = button.dataset.nombre;
        document.getElementById('modalCreditos').textContent = button.dataset.creditos;
        document.getElementById('modalCiclo').textContent = "Ciclo " + button.dataset.ciclo;

        document.getElementById('courseModal').classList.remove('hidden');
    });
});

function closeModal() {
    document.getElementById('courseModal').classList.add('hidden');
}

document.getElementById('closeModal').onclick = closeModal;
document.getElementById('closeModa2').onclick = closeModal;
document.getElementById('courseOverlay').onclick = closeModal;

const formulario = document.getElementById("void-form");
const input_codigo = document.getElementById("input-codigo");

formulario.addEventListener("submit", function () {
    input_codigo.value = codigoCurso;
});



</script>


<?php if (!empty($_SESSION['void_success'])): ?>
<script>
    alert("<?= addslashes($_SESSION['void_success']) ?>");
</script>
<?php unset($_SESSION['void_success']); endif; ?>

<?php if (!empty($_SESSION['enroll_success'])): ?>
<script>
    alert("<?= addslashes($_SESSION['enroll_success']) ?>");
</script>
<?php unset($_SESSION['enroll_success']); endif; ?>


