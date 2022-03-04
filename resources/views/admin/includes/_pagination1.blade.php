@if ($paginator->hasPages())
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <ul class="pagination ">
                @foreach ($elements as $page => $url)
                <li class="page-item page-prev @if ($paginator->onFirstPage()) disabled @endif ">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                        <div class="page-item-subtitle">previous</div>
                        <div class="page-item-title">Page</div>
                    </a>
                </li>
                <li class="page-item page-next @if ($paginator->hasMorePages()) @else disabled @endif">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                        <div class="page-item-subtitle">next</div>
                        <div class="page-item-title">Page</div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
