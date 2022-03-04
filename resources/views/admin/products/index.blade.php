@extends('admin.layouts.master')

@section('title')
Products
@endsection

@section('searchbar')

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>

<script>
    $('body').keypress(function (e) {
        if (e.keyCode == 13) {
            $('#search').submit();
        }
    });

</script>

<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search products...">
        @if(Auth()->user()->role->id == '1')
        <a href="#add-roles" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Products
        </a>
        @endif
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-roles" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New Product</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="/admin/products/{{ $dataproducts->slug }}/new" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input name="product_sku" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seller Price</label>
                        <input name="seller_price" type="number" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" placeholder="" required>
                    </div>
                    <input name="profit" type="hidden">
                </div>
                <div class="mt-3">
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="9" y1="12" x2="15" y2="12"></line>
                            <line x1="12" y1="9" x2="12" y2="15"></line>
                        </svg>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th class="text-center">Product Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Seller Price</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Profit</th>
                            @if(Auth()->user()->role->id == '1')
                            <th class="w-1 text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($dataproducts->products->count() == 0)
                        <td colspan="6" class="text-center">
                            No Products Yet.
                        </td>
                        @endif
                        @foreach ($dataproducts->products()->orderBy('price', 'ASC')->get() as $product)
                        <tr>
                            <th class="text-center" data-label="Product Code">
                                {{ $product->product_sku }}
                            </th>
                            <td class="text-muted text-center" data-label="Name">
                                {{ $product->name }}
                            </td>
                            <td class="text-muted text-center" data-label="Seller Price">
                                {{ number_format($product->seller_price, 0) }}
                            </td>
                            <td class="text-muted text-center" data-label="Price">
                                {{ number_format($product->price, 0) }}
                            </td>
                            <td class="text-muted text-center" data-label="Profit">
                                {{ number_format($product->profit, 0) }}
                            </td>
                            @if(Auth()->user()->role->id == '1')
                            <td class="text-muted text-center">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('edit-products', $product->slug) }}" class="btn">
                                        Edit
                                    </a>
                                    <a href="{{ route('del-products', $product->slug) }}" class="btn">
                                        Delete
                                    </a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
