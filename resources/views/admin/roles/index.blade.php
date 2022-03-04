@extends('admin.layouts.master')

@section('title')
Roles
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search roles...">
        <a href="#add-roles" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Roles
        </a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-roles" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New Role</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('auth.roles-add') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Name</label>
                        <input name="display_name" type="text" class="form-control" placeholder="" required>
                    </div>
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
                <table class="table table-vcenter table-mobile-md card-table display dataTable-table" id="roles">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Display Name</th>
                            <th class="w-1 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $roles)
                        <tr>
                            <td class="text-center" data-label="Name">
                                {{ $roles->name }}
                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                {{ $roles->display_name }}
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="/admin/auth/roles-edit/{{ $roles->id }}" class="btn">
                                        Edit
                                    </a>
                                    <a href="/admin/auth/roles-delete/{{ $roles->id }}" class="btn">
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
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#roles').DataTable();
    });

</script>
@endsection
