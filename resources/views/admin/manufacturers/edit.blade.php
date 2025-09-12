<x-app-layout>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="h2">Editar Montadora: {{ $manufacturer->name }}</h1>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.manufacturers.update', $manufacturer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome da Montadora</label>
                        <input type="text"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name', $manufacturer->name) }}"
                            required>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atualizar Montadora</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>