@extends('layouts.app')

@section('title', 'Gerenciar Aprovações')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6 px-4 sm:px-0">
            <h2 class="text-2xl font-bold leading-tight text-primaryText">
                {{ __('Gerenciar Aprovações') }}
            </h2>
        </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium">Sucesso!</span> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">Erro!</span> {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Nova Aprovação -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Adicionar Nova Aprovação</h3>

                    <form action="{{ route('admin.approvals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="student_name" class="block text-sm font-medium text-gray-700">Nome do Aluno/Autor *</label>
                                <input type="text" name="student_name" id="student_name" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">Ex: Aluno NERD✨ ou Professores NERD🧠</p>
                            </div>

                            <div>
                                <label for="course" class="block text-sm font-medium text-gray-700">Curso / Título *</label>
                                <input type="text" name="course" id="course" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">Ex: Aprovado em Agronomia no Pará</p>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descrição Opcional</label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div>
                                <label for="approval_date" class="block text-sm font-medium text-gray-700">Data (Opcional)</label>
                                <input type="date" name="approval_date" id="approval_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Imagem Principal (Obrigatório Base64)</label>
                                <input type="file" id="image_file" accept="image/jpeg, image/png, image/webp"
                                    class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100"
                                >
                                <p class="mt-1 text-xs text-gray-500">Imagens JPG, PNG ou WebP. Convertida automaticamente para Base64.</p>
                                <input type="hidden" name="image_base64" id="image_base64">
                            </div>

                            <div id="preview_container" class="hidden mt-2">
                                <img id="image_preview" src="" alt="Preview" class="max-h-32 object-contain border rounded">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" id="submit_btn"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Salvar Aprovação
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Listagem de Aprovações -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Aprovações Cadastradas</h3>

                    @if ($approvals->count() > 0)
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Imagem</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Aluno/Autor</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Curso</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Data</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Ações</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($approvals as $approval)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="h-16 w-24">
                                                    @if($approval->image_base64)
                                                        <img src="{{ str_starts_with((string)$approval->image_base64, 'data:') ? $approval->image_base64 : asset($approval->image_base64) }}" alt="{{ $approval->student_name }}" class="h-full w-full object-cover rounded">
                                                    @else
                                                        <span class="text-gray-400 italic">Sem imagem</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 font-medium">
                                                {{ $approval->student_name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $approval->course }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $approval->approval_date ? \Carbon\Carbon::parse($approval->approval_date)->format('d/m/Y') : '-' }}
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <button onclick="document.getElementById('edit_modal_{{ $approval->id }}').classList.remove('hidden')" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</button>

                                                <form action="{{ route('admin.approvals.destroy', $approval->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir esta aprovação?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 italic">Nenhuma aprovação cadastrada ainda.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <!-- Modais de Edição -->
    @foreach ($approvals as $approval)
        <div id="edit_modal_{{ $approval->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true" onclick="document.getElementById('edit_modal_{{ $approval->id }}').classList.add('hidden')"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                    Editar Aprovação
                                </h3>
                                <div class="mt-4">
                                    <form action="{{ route('admin.approvals.update', $approval->id) }}" method="POST" id="form_edit_{{ $approval->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Nome do Aluno/Autor *</label>
                                                <input type="text" name="student_name" value="{{ $approval->student_name }}" required
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Curso / Título *</label>
                                                <input type="text" name="course" value="{{ $approval->course }}" required
                                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Substituir Imagem (Opcional)</label>
                                                <input type="file" id="file_edit_{{ $approval->id }}" accept="image/jpeg, image/png, image/webp"
                                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                                >
                                                <input type="hidden" name="image_base64" id="base64_edit_{{ $approval->id }}">

                                                <div class="mt-2">
                                                    <p class="text-xs text-gray-500 mb-1">Imagem atual:</p>
                                                    @if($approval->image_base64)
                                                        <img id="preview_edit_{{ $approval->id }}" src="{{ str_starts_with((string)$approval->image_base64, 'data:') ? $approval->image_base64 : asset($approval->image_base64) }}" class="max-h-24 object-contain border rounded">
                                                    @else
                                                        <img id="preview_edit_{{ $approval->id }}" src="" class="max-h-24 object-contain border rounded hidden">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" onclick="document.getElementById('form_edit_{{ $approval->id }}').submit()"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Atualizar
                        </button>
                        <button type="button" onclick="document.getElementById('edit_modal_{{ $approval->id }}').classList.add('hidden')"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('file_edit_{{ $approval->id }}').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(event) {
                    const base64String = event.target.result;
                    document.getElementById('base64_edit_{{ $approval->id }}').value = base64String;

                    const preview = document.getElementById('preview_edit_{{ $approval->id }}');
                    preview.src = base64String;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        </script>
    @endforeach

    <script>
        // Script para converter o arquivo selecionado no formulário principal para Base64
        document.getElementById('image_file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            // Verificar o tamanho (ex: max 2MB) para evitar sobrecarregar o banco
            if (file.size > 2 * 1024 * 1024) {
                alert('A imagem é muito grande. Por favor, escolha uma imagem menor que 2MB.');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                // A string base64 completa (incluindo "data:image/jpeg;base64,...")
                const base64String = event.target.result;

                // Preencher o input hidden
                document.getElementById('image_base64').value = base64String;

                // Mostrar o preview
                document.getElementById('image_preview').src = base64String;
                document.getElementById('preview_container').classList.remove('hidden');
            };

            reader.readAsDataURL(file);
        });
    </script>
    </div>
@endsection
