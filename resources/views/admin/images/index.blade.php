@extends('layouts.app')

@section('title', 'Gerenciamento de Imagens Dinâmicas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gerenciador de Imagens</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.approvals.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                Aprovações (Home)
            </a>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition">
                Gerenciar Usuários
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition">
                    Sair
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Criar Módulo -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Novo Módulo</h2>
            <form action="{{ route('admin.images.modules.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="module_name" class="block text-gray-700 text-sm font-bold mb-2">Nome do Módulo (ex: Home, About)</label>
                    <input type="text" name="name" id="module_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                    Criar Módulo
                </button>
            </form>
        </div>

        <!-- Adicionar Imagem -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Nova Imagem</h2>
            @if($modules->isEmpty())
                <p class="text-gray-500 italic">Crie um módulo primeiro para adicionar imagens.</p>
            @else
                <form action="{{ route('admin.images.store') }}" method="POST" id="form_create_image">
                    @csrf
                    <div class="mb-4">
                        <label for="module_id" class="block text-gray-700 text-sm font-bold mb-2">Módulo</label>
                        <select name="module_id" id="module_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }} ({{ $module->slug }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="key_select" class="block text-gray-700 text-sm font-bold mb-2">Chave da Imagem</label>
                        <select id="key_select" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2">
                            <option value="">Selecione um módulo primeiro...</option>
                        </select>

                        <div id="custom_key_container" class="hidden">
                            <label for="key" class="block text-gray-700 text-xs font-bold mb-1">Ou digite uma nova chave:</label>
                            <input type="text" name="key" id="key" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Apenas letras, números e _" autocomplete="off">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">As opções mudam conforme o módulo selecionado.</p>
                    </div>

                    <div class="mb-4">
                        <label for="alt_text" class="block text-gray-700 text-sm font-bold mb-2">Texto Alternativo (Alt Text) [Opcional]</label>
                        <input type="text" name="alt_text" id="alt_text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="file_input" class="block text-gray-700 text-sm font-bold mb-2">Selecionar Imagem</label>
                        <input type="file" id="file_input" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                    </div>

                    <!-- Input Oculto para o Base64 -->
                    <input type="hidden" name="base64_data" id="base64_data">

                    <!-- Preview -->
                    <div class="mb-4 hidden" id="preview_container">
                        <p class="text-sm text-gray-600 mb-1">Pré-visualização:</p>
                        <img id="image_preview" src="" alt="Preview" class="max-h-32 object-contain border rounded">
                    </div>

                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                        Salvar Imagem
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Lista de Módulos e Imagens Existentes -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Imagens por Módulo</h2>

    @forelse($modules as $module)
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200 mb-8">
            <h3 class="text-xl font-bold text-blue-800 mb-4 capitalize flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Módulo: {{ $module->name }} ({{ $module->slug }})
            </h3>

            @if($module->images->isEmpty())
                <p class="text-gray-500 italic">Nenhuma imagem neste módulo.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($module->images as $image)
                        <div class="bg-white border rounded-lg overflow-hidden shadow-sm flex flex-col">
                            <div class="h-40 bg-gray-200 flex items-center justify-center p-2 relative group">
                                <img src="{{ $image->base64_data }}" alt="{{ $image->alt_text }}" class="max-h-full max-w-full object-contain">
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                    <button onclick='editImage({{ $image->id }}, @json($image->alt_text))' class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-sm mr-2">Editar</button>
                                </div>
                            </div>
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <div>
                                    <p class="text-sm font-bold text-gray-800 break-all mb-1">Chave: <span class="text-blue-600">{{ $image->key }}</span></p>
                                    <p class="text-xs text-gray-500 mb-2 truncate">Alt: {{ $image->alt_text ?: 'Nenhum' }}</p>

                                    <p class="text-xs text-gray-400 mt-2 bg-gray-100 p-1 rounded font-mono break-all">
                                        &lt;x-dynamic-image module="{{ $module->slug }}" key="{{ $image->key }}" /&gt;
                                    </p>
                                </div>
                                <div class="mt-4 flex justify-between items-center">
                                    <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Edição Invisível (Simplificado) -->
                        <div id="modal_edit_{{ $image->id }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                                <h3 class="text-lg font-bold mb-4">Editar Imagem: {{ $image->key }}</h3>
                                <form action="{{ route('admin.images.update', $image->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Novo Arquivo (opcional)</label>
                                        <input type="file" id="file_edit_{{ $image->id }}" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        <input type="hidden" name="base64_data" id="base64_edit_{{ $image->id }}">
                                    </div>

                                    <div class="mb-4 hidden" id="preview_edit_container_{{ $image->id }}">
                                        <img id="preview_edit_{{ $image->id }}" src="" class="max-h-24 object-contain border rounded">
                                    </div>

                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">Alt Text</label>
                                        <input type="text" name="alt_text" value="{{ $image->alt_text }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </div>

                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="closeEdit({{ $image->id }})" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancelar</button>
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @empty
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-6 rounded text-center">
            Nenhum módulo criado ainda. Comece criando um módulo acima.
        </div>
    @endforelse

</div>

<script>
    // Função utilitária para converter File para Base64
    function getBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
    }

    // Lógica do formulário de criação
    const fileInput = document.getElementById('file_input');
    const base64Data = document.getElementById('base64_data');
    const previewContainer = document.getElementById('preview_container');
    const imagePreview = document.getElementById('image_preview');

    if(fileInput) {
        fileInput.addEventListener('change', async (e) => {
            const file = e.target.files[0];
            if (file) {
                try {
                    const base64 = await getBase64(file);
                    base64Data.value = base64;
                    imagePreview.src = base64;
                    previewContainer.classList.remove('hidden');
                } catch (error) {
                    console.error("Erro ao converter imagem: ", error);
                    alert("Erro ao processar a imagem.");
                }
            } else {
                base64Data.value = '';
                previewContainer.classList.add('hidden');
            }
        });
    }

    // Lógica para os modais de edição
    function editImage(id, currentAlt) {
        const modal = document.getElementById(`modal_edit_${id}`);
        if(modal) {
            modal.classList.remove('hidden');

            const fileEditInput = document.getElementById(`file_edit_${id}`);
            const base64EditData = document.getElementById(`base64_edit_${id}`);
            const previewEditContainer = document.getElementById(`preview_edit_container_${id}`);
            const previewEdit = document.getElementById(`preview_edit_${id}`);

            // Adiciona listener apenas uma vez
            if(!fileEditInput.dataset.listenerAdded) {
                fileEditInput.addEventListener('change', async (e) => {
                    const file = e.target.files[0];
                    if (file) {
                        try {
                            const base64 = await getBase64(file);
                            base64EditData.value = base64;
                            previewEdit.src = base64;
                            previewEditContainer.classList.remove('hidden');
                        } catch (error) {
                            console.error("Erro ao converter imagem: ", error);
                        }
                    } else {
                        base64EditData.value = '';
                        previewEditContainer.classList.add('hidden');
                    }
                });
                fileEditInput.dataset.listenerAdded = 'true';
            }
        }
    }

    function closeEdit(id) {
        const modal = document.getElementById(`modal_edit_${id}`);
        if(modal) {
            modal.classList.add('hidden');
        }
    }

    // Lógica para o Select de Chaves e Custom Input
    document.addEventListener('DOMContentLoaded', () => {
        const moduleSelect = document.getElementById('module_id');
        const keySelect = document.getElementById('key_select');
        const customKeyContainer = document.getElementById('custom_key_container');
        const customKeyInput = document.getElementById('key');
        const formCreateImage = document.getElementById('form_create_image');

        // Mapeamento das chaves usadas no frontend
        const suggestedKeysByModule = {
            'home': [
                'inicio_do_nerd'
            ],
            'about': [
                'nerd_ceo',
                'profs_nerd',
                'profs_med',
                'nerd2',
                'team_isabela_brandao',
                'team_amanda_alves'
            ],
            'projects': [
                'feature_adventure_ready',
                'feature_minimal_and_clean',
                'feature_organized'
            ]
        };

        if(moduleSelect && keySelect) {
            function updateKeySelect() {
                const selectedOption = moduleSelect.options[moduleSelect.selectedIndex];
                const match = selectedOption ? selectedOption.text.match(/\((.*?)\)/) : null;
                const moduleSlug = match ? match[1] : '';

                const keys = suggestedKeysByModule[moduleSlug] || [];

                // Limpa o select
                keySelect.innerHTML = '<option value="">Selecione uma chave...</option>';

                // Popula com as opções do módulo
                keys.forEach(key => {
                    const option = document.createElement('option');
                    option.value = key;
                    option.textContent = key;
                    keySelect.appendChild(option);
                });

                // Adiciona opção customizada
                const customOption = document.createElement('option');
                customOption.value = 'custom';
                customOption.textContent = 'Outra (Digitar nova chave)';
                keySelect.appendChild(customOption);

                // Reseta a interface
                customKeyContainer.classList.add('hidden');
                customKeyInput.removeAttribute('required');
                if (keys.length > 0) {
                    keySelect.selectedIndex = 1; // Seleciona a primeira chave real
                } else {
                    keySelect.value = 'custom';
                }
                triggerCustomKeyLogic();
            }

            function triggerCustomKeyLogic() {
                if(keySelect.value === 'custom') {
                    customKeyContainer.classList.remove('hidden');
                    customKeyInput.setAttribute('required', 'required');
                    customKeyInput.setAttribute('name', 'key');
                    keySelect.removeAttribute('name');
                } else {
                    customKeyContainer.classList.add('hidden');
                    customKeyInput.removeAttribute('required');
                    customKeyInput.removeAttribute('name');
                    keySelect.setAttribute('name', 'key');
                }
            }

            // Listeners
            moduleSelect.addEventListener('change', updateKeySelect);
            keySelect.addEventListener('change', triggerCustomKeyLogic);

            // Inicializa as opções se já tiver um módulo selecionado ao carregar
            if(moduleSelect.options.length > 0) {
                updateKeySelect();
            }
        }
    });
</script>
@endsection
