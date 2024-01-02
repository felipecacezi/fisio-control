<div id="{{ $modalId }}" class="fixed m-4 inset-0 z-50 overflow-auto bg-gray-200 bg-opacity-60 flex items-center justify-center hidden">
    <div class="p-4 bg-white rounded shadow-lg w-96">
        <div class="text-xl font-bold mb-4">{{ $title }}</div>
        {{
            $modalContent
        }}
        <div class="mb-4">
            {{ $buttons }}
            <button class="mt-4 bg-red-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue" id="{{ $closeButtonId }}">Fechar</button>
        </div>
    </div>
</div>
<script>
    const showModal = (modalName)=>{
        const modal = document.getElementById(modalName);
        modal.classList.remove('hidden');
    }
    const hideModal = (modalName)=>{
        const modal = document.getElementById(modalName);
        modal.classList.add('hidden');
    }
</script>
