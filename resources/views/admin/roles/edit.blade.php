@extends('admin.layouts.master')

@section('title')
Editing {{ $roles->display_name }}
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
                <form action="/admin/auth/roles-update/{{ $roles->id }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="" value="{{ $roles->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Name</label>
                        <input type="text" class="form-control" name="display_name" placeholder="" value="{{ $roles->display_name }}">
                    </div>
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
