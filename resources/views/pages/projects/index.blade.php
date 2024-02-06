@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Projetos'])
    <div class="container-fluid py-4">
        <x-form title="Projeto" subtitle="novo" :action="route('projects.store')" :back="route('projects.index')" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="nome" name="Nome" required="true" />
                        {!! Form::text('nome', old('nome', $projects->nome ?? ''), [
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
                        {!! Form::text('localizacao', old('localizacao', $projects->localizacao ?? ''), [
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
                        {!! Form::text('cliente', old('cliente', $projects->cliente ?? ''), [
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
                        {!! Form::text('escopo_inicial', old('escopo_inicial', $projects->escopo_inicial ?? ''), [
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
                        {!! Form::date('data_inicio', old('data_inicio', $projects->data_inicio ?? ''), [
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

    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            ID</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Projeto</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Localização</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Cliente</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Escopo Inicial</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Data de início</th>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder text-center opacity-7 ps-2">
                                            Ações</th>
                                    </tr>
                                </thead>
                                @forelse ($projects as $project)
                                    <tr class="text-left">
                                        <x-table-td>{{ $project->id }}</x-table-td>
                                        <x-table-td>{{ $project->nome }}</x-table-td>
                                        <x-table-td>{{ $project->localizacao }}</x-table-td>
                                        <x-table-td>{{ $project->cliente }}</x-table-td>
                                        <x-table-td>{{ $project->escopo_inicial }}</x-table-td>
                                        <x-table-td>{{ $project->data_inicio }}</x-table-td>
                                        <x-table-td-dropdown :id="$project->id">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-show-{{ $project->id }}" target="_self">
                                                <i class="fas fa-eye" style="font-size: 17px;"></i> Visualizar
                                            </a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-{{ $project->id }}" target="_self">
                                                <i class="fas fa-edit" style="font-size: 17px;"></i> Editar
                                            </a>

                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modal-destroy-{{ $project->id }}" target="_self">
                                                <i class="fas fa-trash" style="font-size: 17px;"></i> Deletar
                                            </a>

                                        </x-table-td-dropdown>
                                    </tr>
                                    @push('modals')
                                        @includeIf('pages.projects.partials.project_modal_show', [
                                            'project' => $project,
                                        ])
                                    @endpush
                                    @push('modals')
                                        @includeIf('pages.projects.partials.project_modal_destroy', [
                                            'project' => $project,
                                        ])
                                    @endpush
                                    @push('modals')
                                        @includeIf('pages.projects.partials.project_modal_edit', [
                                            'project' => $project,
                                        ])
                                    @endpush
                                @empty
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
