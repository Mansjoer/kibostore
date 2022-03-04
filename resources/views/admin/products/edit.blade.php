@extends('admin.layouts.master')

@section('title')
Editing {{ $products->product_sku }}
@endsection

@section('content')

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

<div class="row row-cards justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/admin/products/update/{{ $products->slug }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_sku" placeholder="" required value="{{ $products->product_sku }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="" required value="{{ $products->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seller Price</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                Rp.
                            </span>
                            <input name="seller_price" type="number" class="form-control" value="{{ $products->seller_price }}" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                Rp.
                            </span>
                            <input name="price" type="number" class="form-control" value="{{ $products->price }}" autocomplete="off" required>
                        </div>
                    </div>
                    <input name="profit" type="hidden">
                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-dark" type="submit"> Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection
