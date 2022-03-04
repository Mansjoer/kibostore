@extends('admin.layouts.master')

@section('title')
Editing {{ $users->username }}
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
                <form action="/admin/auth/user-update/{{ $users->id }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="" value="{{ $users->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="" value="{{ $users->username }}">
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Roles</div>
                        <select name="role_id" class="form-select">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{$users->role_id == $role->id  ? 'selected' : ''}}>{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="" value="{{ $users->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="" value="{{ $users->phone }}" readonly>
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
