<x-app-layout>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="h2">Adicionar Novo Modelo</h1>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.models.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="manufacturer_id" class="form-label">Montadora</label>
                        <select class="form-select form-select-lg @error('manufacturer_id') is-invalid @enderror" id="manufacturer_id" name="manufacturer_id" required>
                            <option selected disabled value="">Selecione uma montadora...</option>
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}" {{ old('manufacturer_id') == $manufacturer->id ? 'selected' : '' }}>
                                    {{ $manufacturer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('manufacturer_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Modelo</label>
                        <input type="text"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Ex: Superion"
                            required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.models.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Modelo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>