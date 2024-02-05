
<div class="card">
    <h5 class="card-header bg-transparent border-bottom text-uppercase text-pmf">
        {{ $title ?? '' }}
        <span class="badge bg-warning text-uppercase fw-bold">{{ $subtitle ?? '' }}</span>
    </h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr class="text-uppercase text-center">
                        @forelse ($headers as $header)
                        <th>{{ $header }}</th>
                        @empty
                        Nenhum registro encontrado
                        @endforelse
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-transparent border-top text-muted">
        <div class="row align-items-center">
            <div class="col-6 text-start">
                <span class="align-middle">
                @if ($records && $records->total() > 0)
                    Exibindo de {{ $records->firstItem() }} até {{ $records->lastItem() }} de {{ $records->total() }} registro(s)
                @else
                    0 registro(s)
                @endif
            </div>
            <div class="col-6 d-flex justify-content-end">
                @if($records && method_exists($records, 'links'))
                    {!! $records->appends(request()->query())->links()!!}
                @endif
            </div>
        </div>
    </div>
</div>
