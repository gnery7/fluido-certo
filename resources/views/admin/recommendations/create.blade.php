<x-app-layout>
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="h2">Adicionar Nova Recomendação</h1>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.recommendations.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="car_model_id" class="form-label">Modelo do Veículo</label>
                            <select class="form-select form-select-lg @error('car_model_id') is-invalid @enderror" id="car_model_id" name="car_model_id" required>
                                <option selected disabled value="">Selecione um modelo...</option>
                                @foreach ($carModels as $model)
                                    <option value="{{ $model->id }}" {{ old('car_model_id') == $model->id ? 'selected' : '' }}>
                                        {{ $model->name }} ({{ $model->manufacturer->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('car_model_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="year" class="form-label">Ano</label>
                            <input type="number"
                                class="form-control form-control-lg @error('year') is-invalid @enderror"
                                id="year"
                                name="year"
                                value="{{ old('year') }}"
                                placeholder="Ex: 2024"
                                min="1990"
                                max="{{ date('Y') + 1 }}"
                                required>
                            @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="recommended_oil" class="form-label">Fluido Recomendado</label>
                        <input type="text"
                            class="form-control form-control-lg @error('recommended_oil') is-invalid @enderror"
                            id="recommended_oil"
                            name="recommended_oil"
                            value="{{ old('recommended_oil') }}"
                            placeholder="Ex: Óleo Tipo A"
                            required>
                        @error('recommended_oil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.recommendations.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Recomendação</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>