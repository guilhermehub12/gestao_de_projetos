@props([
    'title' => '',
    'subtitle' => '',
    'action' => '#',
    'method' => 'GET',
    'model' => [],
    'back' => '',
    'buttonTitle' => ''
])

@if ($method == 'GET' || $method == 'POST')
    {!! Form::open(['url' => $action, 'class' => '', 'files' => 'true', 'method' => $method]) !!}
@elseif ($method == 'PUT' || $method == 'DELETE')
    {!! Form::model($model, ['url' => $action, 'class' => '', 'files' => 'true','method' => 'post']) !!}
    @method($method)
@endif

<div class="card">
    <h5 class="card-header bg-transparent border-bottom text-uppercase text-pmf">
        {{ $title }}
        <span class="badge bg-warning text-uppercase fw-bold">{{ $subtitle }}</span>
    </h5>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer bg-transparent border-top">
        <div class="row justify-content-end">
            @if (!empty($back))
            <div class="col-6 col-sm-6 col-md-2 d-grid">
                <a class="btn btn-dark text-uppercase" href="{{ $back }}">
                    <i class="fas fa-backward"></i> Voltar
                </a>
            </div>
            @endif
            <div class="col-6 col-sm-6 col-md-2 d-grid">
                <button type="submit" class="btn btn-warning text-uppercase text-black">
                    <i class="fas fa-save"></i>
                    @if ($method == 'POST')
                        Salvar
                    @else
                        {{ $buttonTitle }}
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}


