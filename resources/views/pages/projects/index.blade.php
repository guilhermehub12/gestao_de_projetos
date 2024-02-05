@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Projetos'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row mb-3 justify-content-end">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('projects.create') }}"
                                        class="btn btn-warning text-uppercase text-black"><i class="fa fa-plus-circle fa-lg"
                                            aria-hidden="true"></i>Projeto</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Projeto</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Localização</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Cliente</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Escopo Inicial</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data de início</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Atribuído a</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Ações</th>
                                    </tr>
                                </thead>
                                @forelse ($projects as $project)
                                    <tr class="text-left">
                                        <x-table-td>{{ $project->nome }}</x-table-td>
                                        <x-table-td>{{ $project->localizacao }}</x-table-td>
                                        <x-table-td>{{ $project->cliente }}</x-table-td>
                                        <x-table-td>{{ $project->escopo_inicial }}</x-table-td>
                                        <x-table-td>{{ $project->data_inicio }}</x-table-td>
                                        <x-table-td>{{ $project->usuario->firstname ?? "" }} {{ $project->usuario->lastname ?? "" }}</x-table-td>
                                        <x-table-td>{{ $project->status }}</x-table-td>
                                        <x-table-td-dropdown :id="$project->id">
                                                <a class="dropdown-item"
                                                    href="{{ route('projects.show', $project) }}" target="_self">
                                                    <i class="fas fa-eye" style="font-size: 17px;"></i> Visualizar
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('projects.edit', $project) }}" target="_self">
                                                    <i class="fas fa-edit" style="font-size: 17px;"></i> Editar
                                                </a>
                                                <a class="dropdown-item"
                                                    href="{{ route('projects.destroy', $project) }}" target="_self">
                                                    <i class="fas fa-trash" style="font-size: 17px;"></i> Deletar
                                                </a>

                                        </x-table-td-dropdown>
                                    </tr>
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
