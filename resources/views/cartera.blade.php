<x-layouts.app :title="__('Cartera')">
    <div class="flex flex-col gap-4 p-4">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">$ Valor Total Recepción</p>
                <p class="text-lg font-semibold text-gray-800">$48.585.592.257</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">($) Valor Total  Recaudado</p>
                <p class="text-lg font-semibold text-gray-800">$307.694.777</p>
            </div>
            <div class="bg-white p-4 rounded-lg shadow text-center flex items-center justify-center">
                <p class="text-red-500 font-medium text-xs">Por Empresa</p>
                <i class="fas fa-chart-bar text-gray-600 text-lg ml-2" icon="chart-bar"></i>
            </div>

            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">Ver</p>
                <div class="flex items-center justify-center gap-1">
                    <button class="px-2 py-1 rounded bg-gray-700 text-white text-xs hover:bg-gray-600" onclick="selectOption(this)">Valor (#)</button>
                    <button class="px-2 py-1 rounded bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor ($)</button>
                    <button class="px-2 py-1 rounded bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="selectOption(this)">Valor (%)</button>
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

            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">Nombre de empresa</p>
                <select class="text-gray-800 font-medium text-xs border-none focus:outline-none w-full">
                    <option>empresa x</option>
                    <option>empresa y</option>
                    <option>empresa i</option>
                    <option>empresa j</option>
                </select>
            </div>
        </div>



        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow lg:col-span-2">

            <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) y Valor Incapacidades Depurado por Año y Estado Incapacidad</h2>
            <div class="relative h-96">
                <canvas id="estadoActualChart"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            </div>

            <!-- por origen incapacidad -->
            <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Origen Incapacidad</h2>
            <div class="relative h-96">
                <canvas id="origenIncapacidadChart"></canvas>
            </div>

            </div>
        </div>



        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Rango Dias Pago
                </h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Estado Tramite
                </h2>
                <div class="relative h-96">
                    <canvas id="edadRangoChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Entidad Responsable</h2>
                <div class="relative h-96">
                    <canvas id="origenChart"></canvas>
                </div>
            </div>
        </div>



        <div class="flex items-center justify-start gap-4 mt-4">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'calendar')">Fecha Recepción</button>
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'monthly')">Fecha Inicio</button>
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
