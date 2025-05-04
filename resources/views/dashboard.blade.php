<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col rounded-xl">
        <div class="flex items-center justify-end gap-4 p-4">
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'audit')" data-view="audit">
            {{ __('Gestión Auditoría Interna') }}
            </button>
            <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-xs hover:bg-gray-300" onclick="switchView(this, 'manual')" data-view="manual">
            {{ __('Actualización Manual') }}
            </button>
            <script>
            function switchView(button, view) {
            const buttons = document.querySelectorAll('.flex button');
            buttons.forEach(btn => {
                if (btn.getAttribute('data-view') === view) {
                btn.classList.add('bg-red-500', 'text-white');
                btn.classList.remove('bg-gray-200', 'text-gray-700');
                } else {
                btn.classList.remove('bg-red-500', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
                }
            });
            }

            document.addEventListener('DOMContentLoaded', function () {
            const defaultButton = document.querySelector('.flex button[data-view="audit"]');
            if (defaultButton) {
                switchView(defaultButton, 'audit');
            }
            });
            </script>
        </div>
        <div class="flex flex-col items-start justify-center flex-1 space-y-45">
            <div class="text-left">
            <span class="text-4xl md:text-7xl font-bold text-gray-700">incapacidades</span>
            <span class="text-4xl md:text-7xl font-bold text-red-600">.col</span>
            <span class="text-lg md:text-xl align-top text-red-600">®</span>
            </div>
            <div class="flex flex-col items-start justify-start space-y-4">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">DASHBOARD DE GESTIÓN EN TIEMPO REAL</h2>
            <p class="text-lg md:text-xl text-gray-600">Verifique los indicadores de nuestra gestión y cumplimiento de los procesos</p>
            </div>
        </div>


        <div class="absolute bottom-0 right-0">
            <x-gradient-curve/>
        </div>

        <div class="absolute bottom-[10%] right-[10%] mt-10 md:bottom-[50px] md:right-40">
            <div class="w-[200px] md:w-[300px] lg:w-[400px]">
            <x-iphone/>
            </div>
        </div>
    </div>
</x-layouts.app>
