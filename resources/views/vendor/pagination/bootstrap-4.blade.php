@if ($paginator->hasPages())
    <nav>
        <ul class="trippbo-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true" style="border:none;"><img style="transform: rotate(90deg)" src="{{asset('img/solo/next.svg')}}" /></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" style="border:none;" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><img style="transform: rotate(90deg)" src="{{asset('img/solo/next.svg')}}" /></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link" style="border:none;">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active " aria-current="page"><span class="page-link pagination-active" >{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link pagination-inactive" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" style="border:none;" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><img style="transform: rotate(-90deg)" src="{{asset('img/solo/next.svg')}}" /></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true" style="border:none;"><img style="transform: rotate(-90deg)" src="{{asset('img/solo/next.svg')}}" /></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
