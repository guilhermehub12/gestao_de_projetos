@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Criar Projeto'])
    <div class="container-fluid py-4">

        <x-form title="Inventário de Dados Pessoais" subtitle="novo" :action="route('projects.store')" :back="route('projects.index')" method="POST">
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
                <div class="col-md-4">
                    <div class="mb-3">
                        <x-input-label for="usuario" name="Atribuído a" required="true" />
                        {!! Form::select('usuario', $users, old('usuario', $projects->usuario ?? ''), [
                            'id' => 'usuario',
                            'class' => 'form-control ' . ($errors->has('usuario') ? 'is-invalid' : ''),
                            'placeholder' => 'Digite o Escopo Inicial do projeto',
                        ]) !!}
                        <x-input-error :message="$errors->first('usuario')" />
                    </div>
                </div>

            </div>

        </x-form>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
