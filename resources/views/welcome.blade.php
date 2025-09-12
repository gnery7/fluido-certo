@extends('layouts.public')

@section('title', 'Bem-vindo ao Fluido Certo')

@section('content')
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Encontre o Fluido Certo para seu Motor</h1>
            <p class="fs-4 col-md-8 mx-auto">
                Nosso sistema ajuda você a escolher o fluido ideal para o motor do seu veículo de forma rápida e precisa.
            </p>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">🚗 Escolha sua Montadora</h5>
                            <p class="card-text">Selecione a montadora do seu veículo para começar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">📅 Escolha o Ano</h5>
                            <p class="card-text">Informe o ano do seu veículo para obter recomendações precisas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">🛢️ Descubra o Óleo Ideal</h5>
                            <p class="card-text">Receba a recomendação do óleo ideal para o seu motor.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('selection') }}" class="btn btn-primary btn-lg mt-4" type="button">
                Começar Agora
            </a>
        </div>
    </div>
@endsection