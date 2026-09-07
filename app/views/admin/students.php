<main class="flex-1 flex flex-col h-full overflow-hidden relative">
    <!-- Header -->
    <header class="h-16 flex items-center justify-between px-6 border-b border-[#e7eaf3] dark:border-gray-700 bg-white dark:bg-[#1a202c] shrink-0 z-10">
        <div class="flex items-center gap-4">
            <button class="md:hidden p-2 text-gray-500 hover:bg-gray-100 rounded-lg">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <h2 class="text-[#0d111b] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] hidden sm:block">Sistema Matrícula Verano 2025</h2>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex gap-1">
                <button class="flex items-center justify-center rounded-lg size-10 hover:bg-[#e7eaf3] dark:hover:bg-gray-700 text-[#0d111b] dark:text-white transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                </button>
                <button class="flex items-center justify-center rounded-lg size-10 hover:bg-[#e7eaf3] dark:hover:bg-gray-700 text-[#0d111b] dark:text-white transition-colors">
                    <span class="material-symbols-outlined">help</span>
                </button>
            </div>
            <div class="h-8 w-px bg-[#e7eaf3] dark:bg-gray-700 mx-2"></div>
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-[#0d111b] dark:text-white">Admin Principal</p>
                    <p class="text-xs text-[#4c5f9a] dark:text-gray-400">admin@uni.edu.pe</p>
                </div>
                <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 border border-[#e7eaf3]" data-alt="Admin user profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCnpT4hNt6AiHSgj9rRJVxZF1u0WOi7-x7roKxaRvjj9iELHx6cr-zTYhFthygGG32kLwsuQAz46fzpcr9Wa4Tdj-MVL_CDSIm4xt0qteizJZG5Nia_xuZrU52uloYV017_DVPTm57RROlL0mpcjXZPJIhC7snXV6SBN-HWW5D24WYZ0N-vy2PAkxd5X44ePIqLH_7AQOmdcyyU32c6uVirVjY87DH9ywjbN7CoPhtibcUcPaeDIySWgI1H98EjiEQdMmWWuHSbuYsh");'></div>
            </div>
        </div>
    </header>
    <!-- Scrollable Area -->
    <div class="flex-1 overflow-y-auto bg-[#f8f9fc] dark:bg-background-dark p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col gap-8">
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" class="flex">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a class="inline-flex items-center text-sm font-medium text-[#4c5f9a] hover:text-primary dark:text-gray-400 dark:hover:text-white" href="#">
                            <span class="material-symbols-outlined text-[18px] me-2">home</span> Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-gray-400 text-sm">chevron_right</span>
                            <a class="ms-1 text-sm font-medium text-[#4c5f9a] hover:text-primary md:ms-2 dark:text-gray-400 dark:hover:text-white" href="#">Gestión Verano</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-symbols-outlined text-gray-400 text-sm">chevron_right</span>
                            <span class="ms-1 text-sm font-medium text-[#0d111b] md:ms-2 dark:text-white">Alumnos Matriculados</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Heading & Actions -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#0d111b] dark:text-white text-3xl font-bold leading-tight tracking-tight">Detalle Alumnos Matriculados</h1>
                    <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-normal leading-normal max-w-2xl">
                        Visualice la lista completa de estudiantes, verifique los cálculos de costos basados en el creditaje y gestione los estados de pago.
                    </p>
                </div>
                <div class="flex gap-3">
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg bg-white dark:bg-gray-800 border border-[#cfd5e7] dark:border-gray-600 px-4 py-2.5 text-sm font-bold text-[#0d111b] dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                        <span class="material-symbols-outlined text-[20px]">download</span> Exportar CSV
                    </button>
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-lg bg-primary px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-blue-700 transition-all">
                        <span class="material-symbols-outlined text-[20px]">add</span> Nueva Matrícula
                    </button>
                </div>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm flex items-start justify-between">
                    <div class="flex flex-col gap-1">
                        <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Total Matriculados</p>
                        <h3 class="text-[#0d111b] dark:text-white text-2xl font-bold">1,245</h3>
                        <div class="flex items-center gap-1 text-[#07883d] text-xs font-medium mt-1">
                            <span class="material-symbols-outlined text-sm">trending_up</span>
                            <span>+5% vs 2023</span>
                        </div>
                    </div>
                    <div class="p-2 bg-blue-50 dark:bg-blue-900/30 rounded-lg text-primary">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm flex items-start justify-between">
                    <div class="flex flex-col gap-1">
                        <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Ingresos Estimados</p>
                        <h3 class="text-[#0d111b] dark:text-white text-2xl font-bold">S/ 450,200</h3>
                        <div class="flex items-center gap-1 text-[#07883d] text-xs font-medium mt-1">
                            <span class="material-symbols-outlined text-sm">trending_up</span>
                            <span>+12% Proyectado</span>
                        </div>
                    </div>
                    <div class="p-2 bg-green-50 dark:bg-green-900/30 rounded-lg text-[#07883d]">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                </div>
                <div class="bg-white dark:bg-[#1a202c] rounded-xl p-5 border border-[#cfd5e7] dark:border-gray-700 shadow-sm flex items-start justify-between">
                    <div class="flex flex-col gap-1">
                        <p class="text-[#4c5f9a] dark:text-gray-400 text-sm font-medium">Pagos Pendientes</p>
                        <h3 class="text-[#0d111b] dark:text-white text-2xl font-bold">S/ 12,500</h3>
                        <div class="flex items-center gap-1 text-[#d32f2f] text-xs font-medium mt-1">
                            <span class="material-symbols-outlined text-sm">error</span>
                            <span>52 alumnos pendientes</span>
                        </div>
                    </div>
                    <div class="p-2 bg-red-50 dark:bg-red-900/30 rounded-lg text-[#d32f2f]">
                        <span class="material-symbols-outlined">pending</span>
                    </div>
                </div>
            </div>
            <!-- Filters & Table Section -->
            <div class="bg-white dark:bg-[#1a202c] rounded-xl border border-[#cfd5e7] dark:border-gray-700 shadow-sm overflow-hidden flex flex-col">
                <!-- Filters Toolbar -->
                <div class="p-4 border-b border-[#e7eaf3] dark:border-gray-700 flex flex-col lg:flex-row gap-4 justify-between items-center bg-gray-50/50 dark:bg-gray-800/20">
                    <div class="relative w-full lg:w-96">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                            <span class="material-symbols-outlined text-[20px]">search</span>
                        </div>
                        <input class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2.5" placeholder="Buscar por código (202021...) o nombre"
                        type="text" />
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                        <select class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary focus:border-primary block w-full sm:w-40 p-2.5">
                            <option selected="">Todos los Cursos</option>
                            <option value="FIS3">Física III</option>
                            <option value="CAL1">Cálculo Integral</option>
                            <option value="PROG">Programación</option>
                        </select>
                        <select class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary focus:border-primary block w-full sm:w-40 p-2.5">
                            <option selected="">Todos los Profesores</option>
                            <option value="AG">Ing. Alberto Gomez</option>
                            <option value="SL">Dr. Sarah Lee</option>
                        </select>
                        <select class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-primary focus:border-primary block w-full sm:w-40 p-2.5">
                            <option selected="">Estado: Todos</option>
                            <option value="paid">Pagado</option>
                            <option value="pending">Pendiente</option>
                        </select>
                    </div>
                </div>
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-[#4c5f9a] dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-800 border-b border-[#e7eaf3] dark:border-gray-700">
                            <tr>
                                <th class="p-4 w-4" scope="col">
                                    <div class="flex items-center">
                                        <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-all-search" type="checkbox"
                                        />
                                        <label class="sr-only" for="checkbox-all-search">checkbox</label>
                                    </div>
                                </th>
                                <th class="px-6 py-3 font-semibold" scope="col">Estudiante</th>
                                <th class="px-6 py-3 font-semibold" scope="col">Curso Matriculado</th>
                                <th class="px-6 py-3 font-semibold" scope="col">Profesor</th>
                                <th class="px-6 py-3 font-semibold text-right" scope="col">Cálculo Costo</th>
                                <th class="px-6 py-3 font-semibold text-right" scope="col">Total</th>
                                <th class="px-6 py-3 font-semibold text-center" scope="col">Estado</th>
                                <th class="px-6 py-3 font-semibold text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr class="bg-white dark:bg-gray-900 border-b border-[#e7eaf3] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors group">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-search-1"
                                        type="checkbox" />
                                        <label class="sr-only" for="checkbox-table-search-1">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                            JP
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-[#0d111b] dark:text-white">Juan Pérez</div>
                                            <div class="text-xs text-[#4c5f9a]">20202145A</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
<span class="size-1.5 rounded-full bg-blue-600"></span> Física III
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-[#0d111b] dark:text-gray-300">
                                    Ing. Alberto Gomez
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="group/tooltip relative inline-block cursor-help">
                                        <span class="text-xs text-[#4c5f9a] border-b border-dashed border-[#4c5f9a]">5h x 8sem x S/20</span>
                                        <!-- CSS Tooltip -->
                                        <div class="invisible group-hover/tooltip:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-20 text-center">
                                            Factor H (S/20) aplicado a 40 horas totales del curso.
                                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#0d111b] dark:text-white">
                                    S/ 800.00
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                        Pagado
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Ver Detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="bg-white dark:bg-gray-900 border-b border-[#e7eaf3] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors group">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-search-2"
                                        type="checkbox" />
                                        <label class="sr-only" for="checkbox-table-search-2">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs">
                                            MR
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-[#0d111b] dark:text-white">Maria Rodriguez</div>
                                            <div class="text-xs text-[#4c5f9a]">20210542C</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-purple-50 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 border border-purple-200 dark:border-purple-800">
<span class="size-1.5 rounded-full bg-purple-600"></span> Cálculo Integral
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-[#0d111b] dark:text-gray-300">
                                    Dr. Sarah Lee
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="group/tooltip relative inline-block cursor-help">
                                        <span class="text-xs text-[#4c5f9a] border-b border-dashed border-[#4c5f9a]">6h x 8sem x S/20</span>
                                        <div class="invisible group-hover/tooltip:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-20 text-center">
                                            Factor H (S/20) aplicado a 48 horas totales del curso.
                                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#0d111b] dark:text-white">
                                    S/ 960.00
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300">
                                        Pendiente
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Ver Detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="bg-white dark:bg-gray-900 border-b border-[#e7eaf3] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors group">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-search-3"
                                        type="checkbox" />
                                        <label class="sr-only" for="checkbox-table-search-3">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-bold text-xs">
                                            CL
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-[#0d111b] dark:text-white">Carlos López</div>
                                            <div class="text-xs text-[#4c5f9a]">20194421H</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1">
                                        <span class="inline-flex w-fit items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
<span class="size-1.5 rounded-full bg-blue-600"></span> Física III
                                        </span>
                                        <span class="inline-flex w-fit items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-800">
<span class="size-1.5 rounded-full bg-orange-600"></span> Química I
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-[#0d111b] dark:text-gray-300">
                                    <div>Ing. Alberto Gomez</div>
                                    <div class="text-xs text-gray-500">Lic. Ana Torres</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="group/tooltip relative inline-block cursor-help">
                                        <span class="text-xs text-[#4c5f9a] border-b border-dashed border-[#4c5f9a]">9h x 8sem x S/20</span>
                                        <div class="invisible group-hover/tooltip:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-20 text-center">
                                            Carga horaria combinada de 2 cursos.
                                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#0d111b] dark:text-white">
                                    S/ 1,440.00
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                        Pagado
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Ver Detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="bg-white dark:bg-gray-900 border-b border-[#e7eaf3] dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors group">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" id="checkbox-table-search-4"
                                        type="checkbox" />
                                        <label class="sr-only" for="checkbox-table-search-4">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="size-9 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs">
                                            ES
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-[#0d111b] dark:text-white">Elena Sanchez</div>
                                            <div class="text-xs text-[#4c5f9a]">20221004I</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-purple-50 text-purple-700 dark:bg-purple-900/30 dark:text-purple-300 border border-purple-200 dark:border-purple-800">
<span class="size-1.5 rounded-full bg-purple-600"></span> Cálculo Integral
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-[#0d111b] dark:text-gray-300">
                                    Dr. Sarah Lee
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="group/tooltip relative inline-block cursor-help">
                                        <span class="text-xs text-[#4c5f9a] border-b border-dashed border-[#4c5f9a]">6h x 8sem x S/20</span>
                                        <div class="invisible group-hover/tooltip:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 p-2 bg-gray-900 text-white text-xs rounded shadow-lg z-20 text-center">
                                            Factor H (S/20) aplicado a 48 horas totales del curso.
                                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-gray-900"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-bold text-[#0d111b] dark:text-white">
                                    S/ 960.00
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                        Rechazado
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Ver Detalle">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <nav aria-label="Table navigation" class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 p-4 bg-white dark:bg-[#1a202c]">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Mostrando <span class="font-semibold text-gray-900 dark:text-white">1-4</span> de <span class="font-semibold text-gray-900 dark:text-white">1,245</span></span>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="#">Anterior</a>
                        </li>
                        <li>
                            <a class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white" href="#">1</a>
                        </li>
                        <li>
                            <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="#">2</a>
                        </li>
                        <li>
                            <a aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="#">3</a>
                        </li>
                        <li>
                            <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="#">4</a>
                        </li>
                        <li>
                            <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <footer class="mt-4 text-center text-xs text-gray-400 pb-6">
                © 2025 Universidad Nacional de Ingeniería - Oficina de Tecnologías de Información
            </footer>
        </div>
    </div>
</main>