@extends('admin.layouts.master')

@section('title')
Users
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <form method="GET" action="/admin/users" id="searchUser">
            <input name="find" type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search users...">
        </form>
    </div>
</div>

<script>
    $('body').keypress(function (e) {
        if (e.keyCode == 13) {
            $('#searchUser').submit();
        }
    });

</script>

@endsection

@section('content')
<div class="row row-cards">
    @foreach ($users as $user)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
                <span class="avatar avatar-lg mb-3 avatar-rounded" style="background-image: url({{ asset('storage/images/avatar/'.$user->avatar) }})"></span>
                <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
                <div class="text-muted"></div>
                <div class="text-muted">{{ $user->username }}</div>
                <div class="mt-3">
                    <span class="badge @if ($user->role->name == 'owner') bg-red-lt @elseif ($user->role->name == 'admin') bg-indigo-lt @elseif ($user->role->name == 'member') bg-teal-lt @endif">{{ $user->role->display_name }}</span>
                </div>
            </div>
            <div class="d-flex">
                <a href="https://api.whatsapp.com/send?phone=62{{ $user->phone }}&text=Hello {{ $user->name }}!" class="card-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                        <polyline points="3 7 12 13 21 7"></polyline>
                    </svg>
                    Text</a>
            </div>
        </div>
    </div>
    @endforeach

    {{ $users->links('admin.includes._pagination1') }}
</div>
@endsection
