<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 mb-0">Gerenciar Recomendações de Fluido</h1>
            <a href="{{ route('admin.recommendations.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                <span class="d-none d-sm-inline">Adicionar Nova Recomendação</span>
            </a>
        </div>

        @if($recommendations->isEmpty())
            <div class="alert alert-info text-center">
                Nenhuma recomendação cadastrada ainda.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($recommendations as $recommendation)
                    <div class="col">
                        <div class="card h-100 shadow-sm card-action"
                             data-bs-toggle="modal"
                             data-bs-target="#actionModal"
                             data-edit-url="{{ route('admin.recommendations.edit', $recommendation->id) }}"
                             data-destroy-url="{{ route('admin.recommendations.destroy', $recommendation->id) }}"
                             style="cursor: pointer;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $recommendation->carModel->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $recommendation->carModel->manufacturer->name }}</h6>
                                <p class="card-text">
                                    <strong>Ano:</strong> {{ $recommendation->year }} <br>
                                    <strong>Fluido:</strong> <span class="badge bg-success">{{ $recommendation->recommended_oil }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Modal de Ações --}}
        <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="actionModalLabel">Ações para a Recomendação</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>O que deseja fazer com esta recomendação?</p>
                        <a href="#" id="modalEditButton" class="btn btn-secondary me-2">
                            <i class="bi bi-pencil-square"></i> Editar Recomendação
                        </a>
                        <form action="#" method="POST" class="d-inline" id="modalDeleteForm" onsubmit="return confirm('Este é o último aviso. Tem a certeza que deseja excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i> Excluir Recomendação
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
    document.addEventListener('DOMContentLoaded', function () {
        const actionModal = document.getElementById('actionModal');
        actionModal.addEventListener('show.bs.modal', function (event) {
            const card = event.relatedTarget;
            const editUrl = card.getAttribute('data-edit-url');
            const destroyUrl = card.getAttribute('data-destroy-url');
            const modalEditButton = actionModal.querySelector('#modalEditButton');
            const modalDeleteForm = actionModal.querySelector('#modalDeleteForm');
            modalEditButton.setAttribute('href', editUrl);
            modalDeleteForm.setAttribute('action', destroyUrl);
        });
    });
</script>
@endpush