<x-modal id="modal-show-{{ $project->id }}" title="Projeto" subtitle="Visualizar" size="lg">
    <x-slot:body>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Nome:</strong>
                {{ $project->nome }}
            </div>
            <div class="col-md-6">
                <strong>Localização:</strong>
                {{ $project->localizacao }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Cliente:</strong>
                {{ $project->cliente }}
            </div>
            <div class="col-md-6">
                <strong>Escopo Inicial:</strong>
                {{ $project->escopo_inicial }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>data_inicio:</strong>
                {{ $project->data_inicio }}
            </div>
        </div>
    </x-slot:body>
    <x-slot:footer>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <button type="button" class="btn btn-secondary text-uppercase waves-effect" data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>
        </div>
    </x-slot:footer>
</x-modal>
