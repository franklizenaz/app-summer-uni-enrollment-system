<main class="flex-1 flex flex-col h-full overflow-hidden bg-background-light dark:bg-background-dark relative">
    <!-- Top Header (Mobile menu trigger could go here) -->
    <header class="h-16 flex items-center px-6 lg:px-10 border-b border-gray-200 dark:border-gray-800 bg-surface-light dark:bg-surface-dark lg:hidden">
        <button class="text-gray-600 dark:text-gray-300">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </header>
    <!-- Scrollable Content Area -->
    <div class="flex-1 overflow-y-auto p-6 lg:p-10 scroll-smooth">
        <div class="max-w-7xl mx-auto flex flex-col gap-8">
            <!-- Breadcrumbs -->
            <div class="flex flex-wrap gap-2 text-sm">
                <a class="text-[#4c5f9a] hover:text-primary transition-colors" href="#">Inicio</a>
                <span class="text-[#4c5f9a]">/</span>
                <a class="text-[#4c5f9a] hover:text-primary transition-colors" href="#">Administración</a>
                <span class="text-[#4c5f9a]">/</span>
                <span class="text-gray-900 dark:text-white font-medium">Usuarios</span>
            </div>
            <!-- Page Heading & Actions -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex flex-col gap-1">
                    <h2 class="text-3xl md:text-4xl font-black tracking-tight text-gray-900 dark:text-white">Gestión de Usuarios</h2>
                    <p class="text-[#4c5f9a] text-base font-normal">Administra cuentas de alumnos, profesores y administrativos.</p>
                </div>
                <button class="flex items-center gap-2 bg-primary hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-lg shadow-blue-500/30 transition-all active:scale-95">
                    <span class="material-symbols-outlined text-[20px]">add</span>
                    <span class="text-sm font-bold">Crear Nuevo Usuario</span>
                </button>
            </div>
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col gap-1">
                    <div class="flex justify-between items-start">
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Usuarios</p>
                        <span class="material-symbols-outlined text-primary bg-primary/10 p-1.5 rounded-md text-[20px]">group</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">14,205</p>
                    <div class="flex items-center gap-1 text-xs text-green-600 font-medium">
                        <span class="material-symbols-outlined text-[16px]">trending_up</span>
                        <span>+12% vs mes anterior</span>
                    </div>
                </div>
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col gap-1">
                    <div class="flex justify-between items-start">
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Alumnos Activos</p>
                        <span class="material-symbols-outlined text-blue-500 bg-blue-100 dark:bg-blue-900/30 p-1.5 rounded-md text-[20px]">school</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">12,800</p>
                </div>
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col gap-1">
                    <div class="flex justify-between items-start">
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Profesores</p>
                        <span class="material-symbols-outlined text-purple-500 bg-purple-100 dark:bg-purple-900/30 p-1.5 rounded-md text-[20px]">cast_for_education</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">850</p>
                </div>
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col gap-1">
                    <div class="flex justify-between items-start">
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Pendientes</p>
                        <span class="material-symbols-outlined text-orange-500 bg-orange-100 dark:bg-orange-900/30 p-1.5 rounded-md text-[20px]">pending_actions</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">45</p>
                    <div class="text-xs text-orange-600 font-medium mt-1">Requiere atención</div>
                </div>
            </div>
            <!-- Filter & Search Bar -->
            <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search Input -->
                <div class="relative w-full md:flex-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-outlined text-gray-400">search</span>
                    </div>
                    <input class="block w-full pl-10 pr-3 py-2.5 border-none rounded-lg bg-background-light dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-2 focus:ring-primary sm:text-sm transition-shadow" placeholder="Buscar por nombre, código UNI o correo..."
                    type="text" />
                </div>
                <!-- Filters -->
                <div class="flex w-full md:w-auto gap-3">
                    <div class="relative w-full md:w-48">
                        <select class="appearance-none block w-full pl-3 pr-10 py-2.5 border-none rounded-lg bg-background-light dark:bg-gray-800 text-gray-700 dark:text-gray-200 text-sm focus:ring-2 focus:ring-primary cursor-pointer">
                            <option value="">Todos los Roles</option>
                            <option value="student">Alumno</option>
                            <option value="professor">Profesor</option>
                            <option value="admin">Administrador</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                    <div class="relative w-full md:w-40">
                        <select class="appearance-none block w-full pl-3 pr-10 py-2.5 border-none rounded-lg bg-background-light dark:bg-gray-800 text-gray-700 dark:text-gray-200 text-sm focus:ring-2 focus:ring-primary cursor-pointer">
                            <option value="">Estado: Todos</option>
                            <option value="active">Activo</option>
                            <option value="inactive">Inactivo</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <span class="material-symbols-outlined text-[20px]">expand_more</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Users Table -->
            <div class="bg-surface-light dark:bg-surface-dark rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Usuario</th>
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Código UNI</th>
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Rol</th>
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Estado</th>
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Último Acceso</th>
                                <th class="py-4 px-6 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            <!-- Row 1 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm">JP</div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Juan Pérez</span>
                                            <span class="text-xs text-gray-500">juan.perez@uni.edu.pe</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300 font-mono">20202154G</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-900/30">
<span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Alumno
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-green-50 text-green-700 dark:bg-green-900/20 dark:text-green-400">
                                                Activo
                                            </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">Hace 2 horas</td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Editar">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors" title="Restablecer Contraseña">
                                            <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Eliminar">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-center bg-no-repeat bg-cover rounded-full w-10 h-10" data-alt="Profile picture of Maria Rodriguez" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAUX_c6BWz7nRcNNQsFSZpsn22KqYS6MHz1ZbaLBqVi-be1XAUPL6zwtpxqPeF2Fot2UOjIA12K9ikWZw-g720zaUx96dt_Y8d8dTnp9ucPJxNlObM23UiT1XAlJh_4PlOmLtpSJzAQz35qCh3LmdwtfGdOx_VP2Y4j_G-vcWthGg2MH6xLM7dltFSrML3VeWtUT4UqsbSu5RpbNE9TLEe5szN8aJI-OVkkg5GlYywKNK0TfoJnyJPSnZbmkOvlbvsXhhLdeZAQQObf");'></div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">María Rodríguez</span>
                                            <span class="text-xs text-gray-500">maria.rodriguez@uni.edu.pe</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300 font-mono">20184002C</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100 dark:bg-purple-900/20 dark:text-purple-300 dark:border-purple-900/30">
<span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span> Profesor
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-green-50 text-green-700 dark:bg-green-900/20 dark:text-green-400">
                                                Activo
                                            </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">Ayer, 18:30</td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-sm">CL</div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Carlos López</span>
                                            <span class="text-xs text-gray-500">carlos.lopez@uni.edu.pe</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300 font-mono">ADMIN004</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100 dark:bg-orange-900/20 dark:text-orange-300 dark:border-orange-900/30">
<span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Admin
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                                Inactivo
                                            </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">Hace 5 días</td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-center bg-no-repeat bg-cover rounded-full w-10 h-10" data-alt="Profile picture of Miguel Angel" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCwuZGjWlahjG7FVzZFOV1nYOhSsGDfKC9U72-JzceZ4NznEYOaVX1RtEuxJc66mpDL0CG8TB5JjE59lnDBHJ6jwLB6ZzGGWbXXvanKe23zPuZ1MJs2RPgAdVhVAPlC1K7vLe-8P9PV7xbT8VAra4tscZR32RSvtCpL1z_epJRoZ6MIkoacOoRtw-XVVpTfk7bJ1ahAxI5BjYvS5KaUhjFLBS3VUSUDTpDQ3twp5wOB---YjIdKKvqhyanj015icMMevm10DBTlfssH");'></div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Miguel Ángel</span>
                                            <span class="text-xs text-gray-500">miguel.angel@uni.edu.pe</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300 font-mono">20210056H</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-900/30">
<span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Alumno
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-green-50 text-green-700 dark:bg-green-900/20 dark:text-green-400">
                                                Activo
                                            </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">Hoy, 09:15</td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 5 -->
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-sm">AV</div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-900 dark:text-white">Ana Vargas</span>
                                            <span class="text-xs text-gray-500">ana.vargas@uni.edu.pe</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300 font-mono">20220331K</td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-900/30">
<span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Alumno
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-red-50 text-red-700 dark:bg-red-900/20 dark:text-red-400">
                                                Bloqueado
                                            </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">Hace 20 días</td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-gray-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                        </button>
                                        <button class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-between px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Mostrando <span class="font-medium text-gray-900 dark:text-white">1</span> a <span class="font-medium text-gray-900 dark:text-white">5</span> de <span class="font-medium text-gray-900 dark:text-white">14,205</span> resultados
                    </p>
                    <div class="flex gap-2">
                        <button class="px-3 py-1 text-sm border border-gray-200 dark:border-gray-700 rounded-md text-gray-500 disabled:opacity-50 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors" disabled="">
                            Anterior
                        </button>
                        <button class="px-3 py-1 text-sm border border-gray-200 dark:border-gray-700 rounded-md text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Spacer -->
        <div class="h-10"></div>
    </div>
</main>