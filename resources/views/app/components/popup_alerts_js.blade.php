<div id="modalSuccess" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center hidden">
    <div class="p-4 bg-white rounded shadow-lg w-96">
        <div class="text-xl font-bold mb-4">Sucesso</div>
        <p id="textModalSuccess"></p>
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalSuccessBtn">Fechar</button>
    </div>
</div>
<script>
    const closeModalSuccessBtn = document.getElementById('closeModalSuccessBtn');
    const modalSuccess = document.getElementById('modalSuccess');
    closeModalSuccessBtn.addEventListener('click', () => {
        modalSuccess.classList.add('hidden');
    });
</script>

<div id="modalError" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center hidden">
    <div class="p-4 bg-white rounded shadow-lg w-96">
        <div class="text-xl font-bold mb-4">Erro</div>
        <p id="textModalError"></p>
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalErrorBtn">Fechar</button>
    </div>
</div>
<script>
    const closeModalErrorBtn = document.getElementById('closeModalErrorBtn');
    const modalError = document.getElementById('modalError');
    closeModalErrorBtn.addEventListener('click', () => {
        modalError.classList.add('hidden');
    });
</script>

<div id="modalAlert" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center hidden">
    <div class="p-4 bg-white rounded shadow-lg w-96">
        <div class="text-xl font-bold mb-4">Atenção</div>
        <p id="textModalAlert"></p>
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="closeModalAlertBtn">Fechar</button>
    </div>
</div>
<script>
    const closeModalAlertBtn = document.getElementById('closeModalAlertBtn');
    const modalAlert = document.getElementById('modalAlert');
    closeModalAlertBtn.addEventListener('click', () => {
        modalAlert.classList.add('hidden');
    });
</script>
