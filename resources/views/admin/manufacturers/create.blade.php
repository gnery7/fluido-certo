<x-app-layout>
    <div class="container py-5">
        {{-- Cabeçalho da Página com classes Bootstrap --}}
        <div class="row mb-4">
            <div class="col">
                <h1 class="h2">Adicionar Nova Montadora</h1>
            </div>
        </div>

        {{-- Card com o formulário --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.manufacturers.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                    <label for="name" class="form-label">Nome da Montadora</label>
                    <input type="text"
                           {{-- A classe 'is-invalid' só é adicionada se houver um erro para o campo 'name' --}}
                           class="form-control form-control-lg @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           {{-- A função 'old' repopula o campo com o valor antigo em caso de erro --}}
                           value="{{ old('name') }}"
                           placeholder="Ex: Montadora Delta"
                           required>

                    {{-- Este bloco só aparece se houver um erro de validação para 'name' --}}
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }} {{-- A variável $message contém a mensagem de erro vinda do controller --}}
                        </div>
                    @enderror
                </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Montadora</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>