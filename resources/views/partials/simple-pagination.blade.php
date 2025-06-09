@if ($paginator->hasPages())
    <div class="join my-5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a rel="previos" class="disabled join-item btn btn-sm">@lang('pagination.previous')</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="next" class="join-item btn btn-sm">@lang('pagination.previous')</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn btn-sm">@lang('pagination.next')</a>
            @else
                <a rel="next" class="disabled join-item btn btn-sm">@lang('pagination.next')</a>
        @endif
    </div>
@endif
