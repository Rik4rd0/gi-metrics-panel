<x-layouts.app :title="__('Incapacidades')">
    <div class="flex flex-col gap-4 p-4">

        <!-- Header -->
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
                <div class="flex items-center justify-center gap-2 options-selector">
                    <button class="px-4 py-2 rounded-md bg-gray-700 text-white text-xs hover:bg-gray-600" onclick="selectOption(this)">Valor (#)</button>
                    <button class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor ($)</button>
                    <button class="px-4 py-2 rounded-md bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor (%)</button>
                </div>

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

        <!-- Gráficos linea 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

            <!-- calendario -->
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

            </div>


            <!--Valor (#) por Estado Actual-->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Estado Actual</h2>
                <div class="relative h-96">
                    <canvas id="estadoActualChart" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>


            <!-- Valor (#) por Entidad Responsable-->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor (#) por Entidad Responsable</h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
                </div>
            </div>
        </div>


        <!-- Gráficos linea 2 -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

            <!--Valor (#) por Edad al Recibir Rango-->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Edad al Recibir Rango</h2>
                <div class="relative h-96">
                    <canvas id="edadRangoChart"></canvas>
                </div>
            </div>


            <!--Valor (#) por Origen-->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Origen</h2>
                <div class="relative h-96">
                    <canvas id="origenChart"></canvas>
                </div>
            </div>

            <!--Valor (#) por Via de Atencion-->
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Via de Atencion</h2>
                <div class="relative h-96">
                    <canvas id="viaAtencionChart"></canvas>
                </div>
            </div>


        </div>



        <div class="flex items-center justify-start gap-4 mt-4">
            <div class="flex items-center justify-start gap-4 mt-4 view-selector">
                <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'calendar')">Vista Calendario</button>
                <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'monthly')">Vista Mensual</button>
            </div>

        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/charts-manager.js') }}"></script>
    <script src="{{ asset('js/ui-controls.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.chartFunctions !== 'undefined') {
                console.log('Página de incapacidades cargada, inicializando gráficos...');
                window.chartFunctions.initAllCharts();
            }
        });

        document.addEventListener('incapacidades-page-loaded', function() {
            if (typeof window.chartFunctions !== 'undefined') {
                console.log('Evento personalizado de carga de página recibido');
                window.chartFunctions.checkAndReinitializeCharts();
            }
        });
    </script>
</x-layouts.app>
