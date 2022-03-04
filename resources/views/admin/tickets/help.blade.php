@extends('admin.layouts.master')

@section('title')
Contact Admin
@endsection

@section('content')
<div class="row row-cards justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input id="title" type="text" class="form-control" name="title" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea id="message" name="description" class="form-control" rows="6" placeholder="Message.." required></textarea>
                    </div>

                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="sendMessage" onClick="formSubmit()" type="submit"> Send Message</button>
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
