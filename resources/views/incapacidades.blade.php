<x-layouts.app :title="__('Incapacidades')">
    <div class="flex flex-col gap-4 p-4">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">No. Total Incapacidades Recibidas</p>
                <p class="text-lg font-semibold text-gray-800">927</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">($) Valor Total Incapacidades Recibidas</p>
                <p class="text-lg font-semibold text-gray-800">$307.694.777</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center flex items-center justify-center">
                <p class="text-red-500 font-medium text-xs">Por Empresa</p>
                <i class="fas fa-chart-bar text-gray-600 text-lg ml-2" icon="chart-bar"></i>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">Año</p>
                <select class="text-gray-800 font-medium text-xs border-none focus:outline-none w-full">
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                </select>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">Mes</p>
                <select class="text-gray-800 font-medium text-xs border-none focus:outline-none w-full">
                    <option>enero</option>
                    <option>febrero</option>
                    <option>marzo</option>
                    <option>abril</option>
                    <option>mayo</option>
                    <option>junio</option>
                    <option>julio</option>
                    <option>agosto</option>
                    <option>septiembre</option>
                    <option>octubre</option>
                    <option>noviembre</option>
                    <option>diciembre</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-red-500 text-xs mb-2 text-center">Ver</p>
                <div class="flex items-center justify-center gap-2">
                    <button class="px-4 py-2 rounded-md bg-gray-700 text-white text-xs hover:bg-gray-600" onclick="selectOption(this)">Valor (#)</button>
                    <button class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor ($)</button>
                    <button class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor (%)</button>
                </div>
                <script>
                    function selectOption(button) {
                    const buttons = document.querySelectorAll('.flex button');
                        buttons.forEach(btn => {
                        btn.classList.remove('bg-gray-700', 'text-white');
                        btn.classList.add('bg-gray-200', 'text-gray-700');
                    });

                        button.classList.add('bg-gray-700', 'text-white');
                        button.classList.remove('bg-gray-200', 'text-gray-700');
                    }

                    document.addEventListener('DOMContentLoaded', function () {
                    const defaultButton = document.querySelector('.flex button');
                    if (defaultButton) {
                    selectOption(defaultButton);
                    }
                    });
                </script>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <p class="text-red-500 font-medium text-xs mb-2 text-center">Nombre de empresa</p>
                <select class="text-gray-800 font-medium text-xs border-none focus:outline-none w-full">
                    <option>empresa x</option>
                    <option>empresa y</option>
                    <option>empresa i</option>
                    <option>empresa j</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Calendario de recepción de Incapacidades</h2>
                <div class="flex justify-between items-center mb-2">
                    <button id="prev-month" class="text-gray-700 hover:text-red-500">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="text-center text-gray-700 font-medium" id="calendar-header"></div>
                    <button id="reset-filter" class="text-xs text-gray-500 hover:text-red-500" title="Limpiar filtro">
                        <i class="fas fa-undo"></i> Limpiar
                    </button>
                    <button id="next-month" class="text-gray-700 hover:text-red-500">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center text-sm">
                    <div class="font-semibold">Dom</div>
                    <div class="font-semibold">Lun</div>
                    <div class="font-semibold">Mar</div>
                    <div class="font-semibold">Mié</div>
                    <div class="font-semibold">Jue</div>
                    <div class="font-semibold">Vie</div>
                    <div class="font-semibold">Sáb</div>
                    <div id="calendar-days" class="col-span-7 grid grid-cols-7 gap-1"></div>
                </div>

                                <!-- filepath: c:\Users\bysay\OneDrive\Escritorio\incapacidades.col\gi-metrics-panel\resources\views\incapacidades.blade.php -->
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Variables para el calendario
                    let currentDate = new Date();
                    let selectedDate = null;
                    let selectedRange = {start: null, end: null};
                    let isRangeSelection = false;

                    // Datos de ejemplo (simula incapacidades por día)
                    const incapacidadesPorDia = {};

                    // Generar datos aleatorios para demostración
                    function generarDatosDemo() {
                        // Limpiar datos existentes
                        Object.keys(incapacidadesPorDia).forEach(key => delete incapacidadesPorDia[key]);

                        const year = currentDate.getFullYear();
                        const month = currentDate.getMonth();
                        const daysInMonth = new Date(year, month + 1, 0).getDate();

                        // Generar entre 10-20 días con incapacidades
                        const diasConIncapacidades = Math.floor(Math.random() * 10) + 10;

                        for (let i = 0; i < diasConIncapacidades; i++) {
                            const day = Math.floor(Math.random() * daysInMonth) + 1;
                            const count = Math.floor(Math.random() * 20) + 1;
                            const dateKey = `${year}-${month+1}-${day}`;
                            incapacidadesPorDia[dateKey] = count;
                        }
                    }

                    // Renderizar calendario
                    function renderCalendar() {
                        const calendarHeader = document.getElementById('calendar-header');
                        const calendarDays = document.getElementById('calendar-days');

                        // Nombre del mes y año
                        const options = { year: 'numeric', month: 'long' };
                        calendarHeader.textContent = currentDate.toLocaleDateString('es-ES', options);

                        // Limpiar días anteriores
                        calendarDays.innerHTML = '';

                        // Calcular el primer día del mes
                        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                        const startDay = firstDay.getDay(); // 0 = domingo, 1 = lunes, etc.

                        // Calcular el número de días en el mes
                        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                        const totalDays = lastDay.getDate();

                        // Añadir celdas vacías para los días antes del primer día del mes
                        for (let i = 0; i < startDay; i++) {
                            const emptyDay = document.createElement('div');
                            emptyDay.classList.add('h-9', 'bg-gray-50');
                            calendarDays.appendChild(emptyDay);
                        }

                        // Añadir los días del mes
                        for (let day = 1; day <= totalDays; day++) {
                            const dayElement = document.createElement('div');
                            const dateObj = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                            const dateKey = `${dateObj.getFullYear()}-${dateObj.getMonth()+1}-${day}`;

                            dayElement.textContent = day;
                            dayElement.classList.add('h-9', 'flex', 'items-center', 'justify-center', 'cursor-pointer', 'hover:bg-gray-100', 'transition-colors');

                            // Colorear según cantidad de incapacidades
                            if (incapacidadesPorDia[dateKey]) {
                                const count = incapacidadesPorDia[dateKey];
                                if (count > 10) {
                                    dayElement.classList.add('bg-red-600', 'text-white');
                                } else if (count > 5) {
                                    dayElement.classList.add('bg-red-400', 'text-white');
                                } else {
                                    dayElement.classList.add('bg-red-200');
                                }
                            }

                            // Marcar día seleccionado o rango
                            if (selectedDate && dateObj.toDateString() === selectedDate.toDateString()) {
                                dayElement.classList.add('ring-2', 'ring-red-500');
                            } else if (isRangeSelection && selectedRange.start && selectedRange.end) {
                                if (dateObj >= selectedRange.start && dateObj <= selectedRange.end) {
                                    dayElement.classList.add('bg-red-100');
                                    if (dateObj.toDateString() === selectedRange.start.toDateString() ||
                                        dateObj.toDateString() === selectedRange.end.toDateString()) {
                                        dayElement.classList.add('ring-2', 'ring-red-500');
                                    }
                                }
                            }

                            // Evento de clic para selección
                            dayElement.addEventListener('click', function(e) {
                                if (e.shiftKey && selectedDate) {
                                    // Selección de rango con Shift
                                    isRangeSelection = true;
                                    const clickedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

                                    if (clickedDate < selectedDate) {
                                        selectedRange.start = clickedDate;
                                        selectedRange.end = selectedDate;
                                    } else {
                                        selectedRange.start = selectedDate;
                                        selectedRange.end = clickedDate;
                                    }

                                    actualizarDashboard(selectedRange.start, selectedRange.end);
                                } else {
                                    // Selección simple
                                    isRangeSelection = false;
                                    selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                                    selectedRange = {start: null, end: null};

                                    actualizarDashboard(selectedDate);
                                }

                                renderCalendar();
                            });

                            calendarDays.appendChild(dayElement);
                        }
                    }

                    // Función para actualizar el dashboard basado en la fecha seleccionada
                    function actualizarDashboard(fechaInicio, fechaFin = null) {
                        console.log('Actualizando dashboard con fechas:');
                        console.log('Inicio:', fechaInicio);
                        console.log('Fin:', fechaFin);

                        // Mostrar indicador visual de filtro activo
                        const indicadorFiltro = document.createElement('div');
                        indicadorFiltro.id = 'filtro-activo';
                        indicadorFiltro.classList.add('fixed', 'top-5', 'right-5', 'bg-red-500', 'text-white', 'px-3', 'py-2', 'rounded-md', 'shadow-lg', 'z-50');

                        // Remover indicador existente si hay
                        const oldIndicador = document.getElementById('filtro-activo');
                        if (oldIndicador) {
                            oldIndicador.remove();
                        }

                        let fechaFormateada;
                        if (fechaFin) {
                            const opcionesFecha = { day: 'numeric', month: 'short' };
                            fechaFormateada = `${fechaInicio.toLocaleDateString('es-ES', opcionesFecha)} - ${fechaFin.toLocaleDateString('es-ES', opcionesFecha)}`;
                            indicadorFiltro.textContent = `Filtro: ${fechaFormateada}`;
                        } else {
                            const opcionesFecha = { day: 'numeric', month: 'short', year: 'numeric' };
                            fechaFormateada = fechaInicio.toLocaleDateString('es-ES', opcionesFecha);
                            indicadorFiltro.textContent = `Filtro: ${fechaFormateada}`;
                        }

                        document.body.appendChild(indicadorFiltro);

                        // Aquí iría el código para actualizar los gráficos y datos
                        // Ejemplo:
                        // actualizarGraficoEstadoActual(fechaInicio, fechaFin);
                        // actualizarGraficoEntidadResponsable(fechaInicio, fechaFin);
                        // etc.
                    }

                    // Resetear el filtro
                    document.getElementById('reset-filter').addEventListener('click', function() {
                        selectedDate = null;
                        selectedRange = {start: null, end: null};
                        isRangeSelection = false;

                        const oldIndicador = document.getElementById('filtro-activo');
                        if (oldIndicador) {
                            oldIndicador.remove();
                        }

                        // Aquí se debe resetear los gráficos al estado original
                        console.log('Filtro reseteado');

                        renderCalendar();
                    });

                    // Navegación por meses
                    document.getElementById('prev-month').addEventListener('click', function() {
                        currentDate.setMonth(currentDate.getMonth() - 1);
                        generarDatosDemo();
                        renderCalendar();
                    });

                    document.getElementById('next-month').addEventListener('click', function() {
                        currentDate.setMonth(currentDate.getMonth() + 1);
                        generarDatosDemo();
                        renderCalendar();
                    });

                    // Inicialización
                    generarDatosDemo();
                    renderCalendar();

                });
                </script>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Estado Actual</h2>
                <div class="relative h-96">
                    <canvas id="estadoActualChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Entidad Responsable</h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
                </div>
            </div>
        </div>



        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Entidad Responsable</h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Edad al Recibir Rango</h2>
                <div class="relative h-96">
                    <canvas id="edadRangoChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Origen</h2>
                <div class="relative h-96">
                    <canvas id="origenChart"></canvas>
                </div>
            </div>
        </div>



        <div class="flex items-center justify-start gap-4 mt-4">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'calendar')">Vista Calendario</button>
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'monthly')">Vista Mensual</button>
            <script>
                function switchView(button, view) {
                const buttons = document.querySelectorAll('.flex button');
                buttons.forEach(btn => {
                    btn.classList.remove('bg-red-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });

                button.classList.add('bg-red-500', 'text-white');
                button.classList.remove('bg-gray-200', 'text-gray-700');
                }

                document.addEventListener('DOMContentLoaded', function () {
                const defaultButton = document.querySelector('.flex button');
                if (defaultButton) {
                    switchView(defaultButton, 'calendar');
                }
                });
            </script>
        </div>


    </div>


</x-layouts.app>
