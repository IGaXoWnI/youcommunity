<div class="flex items-center space-x-2">
    @if ($paginator->onFirstPage())
        <span class="disabled bg-gray-300 text-gray-500 px-2 py-1 rounded-md">Previous</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="bg-amber-500 text-white px-2 py-1 rounded-md hover:bg-amber-600">Previous</a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="disabled bg-gray-300 text-gray-500 px-2 py-1 rounded-md">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="bg-amber-500 text-white px-2 py-1 rounded-md">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="bg-white text-gray-700 px-2 py-1 rounded-md hover:bg-gray-100">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="bg-amber-500 text-white px-2 py-1 rounded-md hover:bg-amber-600">Next</a>
    @else
        <span class="disabled bg-gray-300 text-gray-500 px-2 py-1 rounded-md">Next</span>
    @endif
</div> 