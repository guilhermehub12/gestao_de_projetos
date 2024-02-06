<x-modal id="modal-edit-{{ $project->id }}" title="Projeto" subtitle="Editar" size="lg">
    <x-slot:body>
        <x-form title="Projeto" subtitle="edição" :action="route('projects.update', $project)" :back="route('projects.index')" method="PUT"
            buttonTitle="Atualizar">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="nome" name="Nome" required="true" />
                        {!! Form::text('nome', old('nome', $project->nome ?? ''), [
                            'id' => 'nome',
                            'class' => 'form-control ' . ($errors->has('nome') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite o nome do projeto',
                        ]) !!}
                        <x-input-error :message="$errors->first('nome')" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="localizacao" name="Localização" />
                        {!! Form::text('localizacao', old('localizacao', $project->localizacao ?? ''), [
                            'id' => 'localizacao',
                            'class' => 'form-control ' . ($errors->has('localizacao') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite a localização',
                            'rows' => 3,
                        ]) !!}
                        <x-input-error :message="$errors->first('localizacao')" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="cliente" name="Cliente" />
                        {!! Form::text('cliente', old('cliente', $project->cliente ?? ''), [
                            'id' => 'cliente',
                            'class' => 'form-control ' . ($errors->has('cliente') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite o cliente',
                            'rows' => 3,
                        ]) !!}
                        <x-input-error :message="$errors->first('cliente')" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="escopo_inicial" name="Escopo Inicial" required="true" />
                        {!! Form::text('escopo_inicial', old('escopo_inicial', $project->escopo_inicial ?? ''), [
                            'id' => 'escopo_inicial',
                            'class' => 'form-control ' . ($errors->has('escopo_inicial') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite o Escopo Inicial do projeto',
                        ]) !!}
                        <x-input-error :message="$errors->first('escopo_inicial')" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="data_inicio" name="Data de Inicio" />
                        {!! Form::date('data_inicio', old('data_inicio', $project->data_inicio ?? ''), [
                            'id' => 'data_inicio',
                            'class' => 'form-control ' . ($errors->has('data_inicio') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite a Data de Inicio',
                            'rows' => 3,
                        ]) !!}
                        <x-input-error :message="$errors->first('data_inicio')" />
                    </div>
                </div>
            </div>
        </x-form>
    </x-slot:body>
</x-modal>
