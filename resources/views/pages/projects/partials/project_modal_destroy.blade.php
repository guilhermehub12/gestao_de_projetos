<x-modal id="modal-destroy-{{ $project->id }}" title="Projeto" subtitle="Deletar">
    <x-slot:body>
        <div class="row mb-3">
            <div class="col-md-12 text-center text-danger fs-5">
                Deseja apagar o projeto abaixo?
            </div>
        </div>
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
            <div class="col-md-6">
                <form method="post" action="{{ route('projects.destroy', [$project]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning text-uppercase text-black waves-effect"
                            data-bs-dismiss="modal">
                            <i class="fas fa-check-circle"></i> Sim
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="d-grid">
                    <button type="button" class="btn btn-secondary text-uppercase waves-effect"
                        data-bs-dismiss="modal">
                        <i class="fas fa-times-circle"></i> Fechar
                    </button>
                </div>
            </div>
        </div>
    </x-slot:footer>
</x-modal>
