@extends('admin.layouts.master')

@section('title')
Games
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
        <form class="d-inline-block w-9 me-3" method="GET" action="/admin/games" id="search">
            <input name="find" type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search games...">
        </form>
        <a href="#add-roles" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Games
        </a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-roles" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New Game</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('new-games') }}" method="POST" autocomplete="off">
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
                    <div class="mb-3">
                        <label class="form-label">Image Link</label>
                        <input name="image" type="text" class="form-control" placeholder="">
                    </div>
                    <input name="status" type="hidden" value="1">
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
    @foreach ($datagame as $games)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
                <span class="avatar avatar-xl mb-3 avatar-rounded-3" style="background-image: url({{ $games->image }})"></span>
                <h3 class="m-0 mb-1">{{ $games->display_name }}</h3>
                <div class="text mt-3">Total Products</div>
                <div class="text-muted mt-1"><small>{{ $games->products->count() }}</small></div>
                <div class="text-muted mt-3">Server Status</div>
                <div class="mt-1">
                    <span class="badge @if ($games->status == '1') bg-green-lt @elseif ($games->status == '0') bg-red-lt @endif"> @if ($games->status == '1') Online @elseif ($games->status == '0') Offline @endif</span>
                </div>
            </div>
            <div class="d-flex">
                <a href="/admin/products/{{ $games->slug }}" class="card-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                    </svg>
                    View
                </a>
                @if(Auth()->user()->role->id == '1')
                <a href="/admin/games/edit/{{ $games->slug }}" class="card-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                        <line x1="16" y1="5" x2="19" y2="8"></line>
                    </svg>
                    Edit
                </a>
                <a href="/admin/games/del/{{ $games->slug }}" class="card-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="4" y1="7" x2="20" y2="7"></line>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                    </svg>
                    Delete
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    {{ $datagame->links('admin.includes._pagination1') }}
</div>
@endsection
