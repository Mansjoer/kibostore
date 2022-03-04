@extends('admin.layouts.master')

@section('title')
Users
@endsection

@section('searchbar')

<script>
    $('body').keypress(function (e) {
        if (e.keyCode == 13) {
            $('#search').submit();
        }
    });

</script>

<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <form class="d-inline-block w-9 me-3" method="GET" action="/admin/auth/users" id="searchUser">
            <input name="find" type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search users...">
        </form>
        <a href="#add-users" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New User
        </a>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-users" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New User</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('auth.user-add') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div>
                    <div class="mb-3">
                        <label class="form-label required">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-label required">Role</div>
                        <select name="role_id" class="form-select">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="" required>
                    </div>
                    <input name="remember_token" type="hidden">
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="w-1 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center" data-label="Name">
                                {{ $user->name }}
                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                {{ $user->username }}
                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                {{ $user->role->display_name }}
                            </td>
                            <td class="text-muted text-center" data-label="Email">
                                {{ $user->email }}
                            </td>
                            <td class="text-muted text-center" data-label="Phone">
                                {{ $user?->phone }}
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="/admin/auth/user-edit/{{ $user->id }}" class="btn">
                                        Edit
                                    </a>
                                    <a href="/admin/auth/user-delete/{{ $user->id }}" class="btn">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $users->links('admin.includes._pagination1') }}
</div>
@endsection
