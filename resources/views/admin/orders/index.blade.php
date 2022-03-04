@extends('admin.layouts.master')

@section('title')
Order Game
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

@endsection

@section('content')
<div class="row row-cards">
    @foreach ($datagame as $games)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
                <span class="avatar avatar-xl mb-3 avatar-rounded-3" style="background-image: url({{ $games->image }})"></span>
                <h3 class="m-0 mb-1">{{ $games->display_name }}</h3>
            </div>
            <div class="d-flex">
                <a href="/admin/order/{{ $games->slug }}" class="bg-dark card-btn">
                    Select
                </a>
            </div>
        </div>
    </div>
    @endforeach
    {{ $datagame->links('admin.includes._pagination1') }}
</div>
@endsection
