@extends('admin.layouts.master')

@section('title')
Count Win Rate
@endsection

@section('content')
<div class="row row-cards justify-content-center">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-center" for="idMatch">Total Match</label>
                        <input id="tMatch" type="number" class="form-control text-center" name="title" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-center" for="tWr">Total Winrate</label>
                        <input id="tWr" type="number" class="form-control text-center" name="title" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-center" for="wrReq">Winrate Wanted To Achieve</label>
                        <input id="wrReq" type="number" class="form-control text-center" name="title" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <span id="resultText" class="text-center d-block"> </span>
                    </div>
                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="buttonResult" type="button"> Count Winrate</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-simple" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi beatae delectus deleniti dolorem eveniet facere fuga iste nemo nesciunt nihil odio perspiciatis, quia quis reprehenderit sit tempora totam unde.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection