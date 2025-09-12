<x-app-layout>
    <div class="container py-5">
        {{-- Cabeçalho da Página --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 mb-0">Gerenciar Modelos</h1>
            <a href="{{ route('admin.models.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-sm-inline">Adicionar Novo Modelo</span>
            </a>
        </div>

        @if($models->isEmpty())
            <div class="alert alert-info text-center">
                Nenhum modelo cadastrado ainda. Clique em "Adicionar Novo Modelo" para começar.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                @foreach ($models as $model)
                <div class="col">
                        <div class="card h-100 shadow-sm card-action"
                             data-bs-toggle="modal"
                             data-bs-target="#actionModal"
                             data-edit-url="{{ route('admin.models.edit', $model->id) }}"
                             data-destroy-url="{{ route('admin.models.destroy', $model->id) }}"
                             style="cursor: pointer;">
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $model->name }}</h5>
                                <p class="card-text text-muted mb-0">{{ $model->manufacturer->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
        <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="actionModalLabel">Ações para o Modelo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>O que deseja fazer com este modelo?</p>
                        <a href="#" id="modalEditButton" class="btn btn-secondary me-2">
                            <i class="bi bi-pencil-square"></i> Editar Modelo
                        </a>
                        
                        <form action="#" method="POST" class="d-inline" id="modalDeleteForm" onsubmit="return confirm('Este é o último aviso. Tem a certeza que deseja excluir este modelo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i> Excluir Modelo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@push('scripts')
<script>
    // Espera o documento carregar
    document.addEventListener('DOMContentLoaded', function () {
        // Pega a referência do nosso modal
        const actionModal = document.getElementById('actionModal');

        // O Bootstrap dispara um evento 'show.bs.modal' ANTES de o modal ser exibido
        actionModal.addEventListener('show.bs.modal', function (event) {
            // event.relatedTarget é o elemento que acionou o modal (o nosso card)
            const card = event.relatedTarget;

            // Lemos os URLs que guardámos nos atributos data-* do card
            const editUrl = card.getAttribute('data-edit-url');
            const destroyUrl = card.getAttribute('data-destroy-url');

            // Encontramos os botões/formulários DENTRO do modal pelos seus IDs
            const modalEditButton = actionModal.querySelector('#modalEditButton');
            const modalDeleteForm = actionModal.querySelector('#modalDeleteForm');

            // Atualizamos os atributos href (para o link) e action (para o formulário)
            modalEditButton.setAttribute('href', editUrl);
            modalDeleteForm.setAttribute('action', destroyUrl);
        });
    });
</script>
@endpush