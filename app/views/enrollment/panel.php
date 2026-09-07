<div class="mt-[60px] flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 border-b border-slate-200 dark:border-slate-800 pb-6">

    <div>
        <div class="flex items-center gap-3 mb-2">
            <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">Inscripciones</h1>
            <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs font-bold uppercase rounded-full border border-green-200 dark:border-green-800">Abiertas</span>
        </div>
        <p class="text-slate-500 dark:text-slate-400 max-w-2xl">
            Elige los cursos de los que quieras ser partícipe.
        </p>
    </div>

    <div class="flex flex-wrap gap-4">
        <div class="bg-white dark:bg-[#1e293b] px-5 py-3 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex-1 min-w-[140px] text-center">
    
            <!-- Título -->
            <div class="flex items-center justify-center gap-2 text-xs font-semibold uppercase text-slate-400 tracking-wider mb-1">
                <span class="material-symbols-outlined text-sm">calendar_today</span>
                Hoy
            </div>

            <!-- Número del día -->
            <div class="text-3xl font-bold text-slate-800 dark:text-white leading-none">
                <?= date('d') ?>
            </div>

            <!-- Mes -->
            <div class="text-xs uppercase tracking-widest text-slate-400 mt-1">
                <?= date('M') ?>
            </div>

        </div>

    </div>

</div>


<section class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4 mb-4">

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-yellow-600 dark:bg-yellow-900 p-4 rounded-xl border border-yellow-600 dark:border-yellow-800 flex items-center gap-4">
        
        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">docs</span>
        </div>

        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">
                Sondeo de Cursos 1
            </p>
            <p class="text-slate-100 dark:text-white text-xl font-bold">
                Estadística
            </p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="https://docs.google.com/forms/d/e/1FAIpQLSf2Oosy3BST8Wq6pgI63qzqmBt2Fhxl_pbJGmSzmaVUm6KSjQ/viewform">
            <span class="material-symbols-outlined text-[20px]">edit_square</span>
            <span class="hidden sm:inline">Responder</span>
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-yellow-600 dark:bg-yellow-900 p-4 rounded-xl border border-yellow-600 dark:border-yellow-800 flex items-center gap-4">
        
        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">docs</span>
        </div>

        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">
                Sondeo de Cursos 1
            </p>
            <p class="text-slate-100 dark:text-white text-xl font-bold">
                Económica
            </p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="https://docs.google.com/forms/d/e/1FAIpQLScWx-uMTHGGKSy7_Fg2N1TDRhmB2joNxwRVUmA_5heawcF0Jw/viewform?pli=1">
            <span class="material-symbols-outlined text-[20px]">edit_square</span>
            <span class="hidden sm:inline">Responder</span>
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-orange-700 dark:bg-orange-900 p-4 rounded-xl border border-orange-800 dark:border-orange-800 flex items-center gap-4">
        
        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">docs</span>
        </div>

        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">
                Sondeo de Cursos 2
            </p>
            <p class="text-slate-100 dark:text-white text-xl font-bold">
                Estadística
            </p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="#">
            <span class="material-symbols-outlined text-[20px]">edit_square</span>
            <span class="hidden sm:inline">Responder</span>
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-orange-700 dark:bg-orange-900 p-4 rounded-xl border border-orange-800 dark:border-orange-800 flex items-center gap-4">

        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">docs</span>
        </div>

        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">
                Sondeo de Cursos 2
            </p>
            <p class="text-slate-100 dark:text-white text-xl font-bold">
                Económica
            </p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="#">
            <span class="material-symbols-outlined text-[20px]">edit_square</span>
            <span class="hidden sm:inline">Responder</span>
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-[#880101] dark:bg-[#151a2a] p-4 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">book</span>
        </div>
        
        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Pre-Matrícula</p>
            <p class="text-slate-100 dark:text-white text-xl font-bold"> Cursos Disponibles</p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="/enrollment/prestart">
            <span class="material-symbols-outlined text-[20px]">touch_app</span>
            <span class="hidden sm:inline">Ver Cursos</span>
        </a>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-6 gap-4 bg-[#880101] dark:bg-[#151a2a] p-4 rounded-xl border border-slate-200 dark:border-slate-800 flex items-center gap-4">
        <div class="col-span-1 size-12 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-primary">
            <span class="material-symbols-outlined">book_2</span>
        </div>
        
        <div class="col-span-3">
            <p class="text-slate-100 dark:text-slate-400 text-xs font-medium uppercase tracking-wider">Matrícula</p>
            <p class="text-slate-100 dark:text-white text-xl font-bold">Corrobora tus Cursos</p>
        </div>

        <a class="col-span-2 flex items-center justify-center gap-2 px-8 py-8 text-sm font-bold text-white hover:text-[#880101] hover:bg-white rounded-lg transition-colors" href="#">
            <span class="material-symbols-outlined text-[20px]">touch_double</span>
            <span class="hidden sm:inline">Verificar Matrícula</span>
        </a>

    </div>
    
</section>