@extends('layouts.public')

@section('title', 'Seleção de Veículo')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Selecione seu Veículo</h4>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="manufacturer" class="form-label">Montadora</label>
                    <select class="form-select form-select-lg" id="manufacturer" name="manufacturer_id" required>
                        <option selected disabled value="">Selecione...</option>
                        {{-- Este loop é preenchido pelos dados vindos do OilController --}}
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="car_model" class="form-label">Modelo</label>
                    <select class="form-select form-select-lg" id="car_model" name="car_model_id" required disabled>
                        <option selected disabled value="">Aguardando montadora...</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="year" class="form-label">Ano</label>
                    <select class="form-select form-select-lg" id="year" name="year" required disabled>
                        <option selected disabled value="">Aguardando modelo...</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 text-center">
                <div id="loading-spinner" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Buscando...</span>
                    </div>
                </div>
                <div id="result-area" class="alert alert-success fs-4 fw-bold p-4" style="display: none;">
                    O fluido recomendado é: <span id="recommended-oil"></span>
                </div>
                 <div id="error-area" class="alert alert-danger" style="display: none;">
                    Não foi encontrada uma recomendação para esta seleção.
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Este script é o coração da funcionalidade da página.
    document.addEventListener('DOMContentLoaded', function () {
        const manufacturerSelect = document.getElementById('manufacturer');
        const modelSelect = document.getElementById('car_model');
        const yearSelect = document.getElementById('year');
        
        const resultArea = document.getElementById('result-area');
        const errorArea = document.getElementById('error-area');
        const recommendedOil = document.getElementById('recommended-oil');
        const loadingSpinner = document.getElementById('loading-spinner');

        function resetSelect(select, message, disabled = true) {
            select.innerHTML = `<option selected disabled value="">${message}</option>`;
            select.disabled = disabled;
        }

        // Evento: Quando o usuário escolhe uma Montadora
        manufacturerSelect.addEventListener('change', function () {
            const manufacturerId = this.value;
            
            resetSelect(modelSelect, 'Carregando modelos...');
            resetSelect(yearSelect, 'Aguardando modelo...');
            resultArea.style.display = 'none';
            errorArea.style.display = 'none';

            if (!manufacturerId) return;

            // Faz uma chamada à nossa API para buscar os modelos
            fetch(`{{ route('api.models') }}?manufacturer_id=${manufacturerId}`)
                .then(response => response.json())
                .then(data => {
                    resetSelect(modelSelect, 'Selecione o modelo...', false);
                    data.forEach(model => {
                        modelSelect.innerHTML += `<option value="${model.id}">${model.name}</option>`;
                    });
                });
        });

        // Evento: Quando o usuário escolhe um Modelo
        modelSelect.addEventListener('change', function () {
            const carModelId = this.value;
            
            resetSelect(yearSelect, 'Carregando anos...');
            resultArea.style.display = 'none';
            errorArea.style.display = 'none';

            if (!carModelId) return;

            // Faz uma chamada à nossa API para buscar os anos
            fetch(`{{ route('api.years') }}?car_model_id=${carModelId}`)
                .then(response => response.json())
                .then(data => {
                    resetSelect(yearSelect, 'Selecione o ano...', false);
                    data.forEach(year => {
                        yearSelect.innerHTML += `<option value="${year}">${year}</option>`;
                    });
                });
        });

        // Evento: Quando o usuário escolhe o Ano (busca a recomendação final)
        yearSelect.addEventListener('change', function() {
            const carModelId = modelSelect.value;
            const year = this.value;

            resultArea.style.display = 'none';
            errorArea.style.display = 'none';
            if (!carModelId || !year) return;

            loadingSpinner.style.display = 'block';

            // Faz uma chamada à nossa API para buscar a recomendação
            fetch(`{{ route('api.recommendation') }}?car_model_id=${carModelId}&year=${year}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Recommendation not found');
                    }
                    return response.json();
                })
                .then(data => {
                    recommendedOil.textContent = data.oil;
                    resultArea.style.display = 'block';
                })
                .catch(error => {
                    errorArea.style.display = 'block';
                })
                .finally(() => {
                    loadingSpinner.style.display = 'none';
                });
        });
    });
</script>
@endpush