@extends('admin.layouts.master')

@section('title')
{{ $dataproducts->display_name }}
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <a href="#add-order" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Order
        </a>
    </div>

    @include('admin.orders.form')

</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="list-group card-list-group">
                @foreach ($dataproducts->products()->orderBy('price','ASC')->get() as $products)
                <div class="list-group-item">
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <span class="avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon avatar-icon icon-tabler icon-tabler-diamond" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 5h12l3 5l-8.5 9.5a0.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5"></path>
                                    <path d="M10 12l-2 -2.2l.6 -1"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <strong>{{ $products->product_sku }}</strong>
                            <div class="text-muted">
                                {{ $products->name }}
                            </div>
                        </div>
                        <div class="col-auto text-muted">
                            <strong> Rp. {{ number_format($products->price) }} </strong>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <h3 class="mb-3">Other Games</h3>
        <div class="row row-cards">
            @foreach ($datagames as $games)
            <a href="{{ $games->slug }}" style="text-decoration:none; color: inherit;">
                <div class="col-md-6 col-lg-12 ">
                    <div class="card">
                        <div class="row row-0">
                            <div class="col-auto">
                                <img src="{{ $games->image }}" class="rounded-start" alt="Shape of You" width="80" height="80">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    {{ $games->display_name }}
                                    <div class="text-muted">
                                        {{ $games->products()->count() }} Total Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
