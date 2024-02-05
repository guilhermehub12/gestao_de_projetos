@props([
    'id' => '',
    'links' => [],
    'can' => false
])
<td class="text-center align-middle">
    <div class="dropdown dropstart mt-4 mt-sm-0">
        <a
            href="#"
            class="btn btn-secondary dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            id="{{ $id }}"
        >
            <i class="fas fa-cog"></i> <i class="mdi mdi-chevron-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-dark">
            {{-- @forelse ($links as $link)
                @if ($can)
                    <a
                        class="dropdown-item"
                        href="{{ $link['link'] }}"
                        target="{{ $link['target'] ?? '_self' }}"
                    >
                        <i class="{{ $link['icon'] }}" style="font-size: 17px;"></i> {{ $link['title'] }}
                    </a>
                @endif
            @empty
            @endforelse --}}
            {{ $slot }}
        </div>
    </div>
</td>
