<div
    id="{{ $id }}"
    class="modal fade"
    tabindex="-1"
    aria-labelledby="myModalLabel"
    aria-hidden="true"
>
    {{ $start ?? '' }}
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase text-pmf">
                    {{ $title ?? '' }}
                    <span class="badge bg-warning text-uppercase fw-bold">{{ $subtitle }}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{ $body ?? '' }}
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
    {{ $end ?? '' }}
</div>
