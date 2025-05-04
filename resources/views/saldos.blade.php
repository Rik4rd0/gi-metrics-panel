<x-layouts.app :title="__('Saldos')">
    <div class="flex flex-col gap-4 p-4">

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">$ Valor Total</p>
                <p class="text-lg font-semibold text-gray-800">$48.585.592.257</p>
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

            <div class="bg-white p-4 rounded-lg shadow text-center">
                <p class="text-red-500 font-medium text-xs">Ver</p>
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
            <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Año y Estado Incapacidad
            </h2>
            <div class="relative h-96">
                <canvas id="estadoActualChart"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Rango Dias Pago
            </h2>
            <div class="relative h-96">
                <canvas id="entidadResponsableChart"></canvas>
            </div>
            </div>

                <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Valor ($) por Entidad responsable y Estado Incapacidad</h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
                </div>
                </div>
        </div>



        <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h2 class="text-red-500 font-semibold mb-4 text-center">Matriz Consolidada de Incapacidades (Años -Mes - Estado - Entidad)
                </h2>
                <div class="relative h-96">
                    <canvas id="entidadResponsableChart"></canvas>
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
