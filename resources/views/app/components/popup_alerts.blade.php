@if (session('success'))
    <div id="modalSuccess" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center">
        <div class="p-4 bg-white rounded shadow-lg w-96">
            <div class="text-xl font-bold mb-4">Sucesso</div>
            <p>{{ session('success') }}</p>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalBtn">Fechar</button>
        </div>
    </div>
    <script>
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modalSuccess');
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
@endif

@if (session('error'))
    <div id="modalError" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center">
        <div class="p-4 bg-white rounded shadow-lg w-96">
            <div class="text-xl font-bold mb-4">Erro</div>
            <p>{{ session('error') }}</p>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalBtn">Fechar</button>
        </div>
    </div>
    <script>
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modalError');
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
@endif

@if (session('warning'))
    <div id="modalAlert" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center">
        <div class="p-4 bg-white rounded shadow-lg w-96">
            <div class="text-xl font-bold mb-4">Erro</div>
            <p>{{ session('error') }}</p>
            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalBtn">Fechar</button>
        </div>
    </div>
    <script>
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('modalAlert');
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    </script>
@endif
