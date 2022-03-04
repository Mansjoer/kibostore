@extends('admin.layouts.master')

@section('title')
Changelog
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        @if(Auth()->user()->username == 'Bisquit')
        <a href="#add-roles" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Changelog
        </a>
        @endif
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-roles" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New Changelog</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('changelog-add') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" placeholder="">
                    </div>
                    <div id="content" class="mb-3">
                    </div>
                    <textarea id="content-textarea" name="description" class="form-control" placeholder="Code Only!" style="display: none"></textarea>
                    <div class="mb-3">
                        <label class="form-label">Version</label>
                        <input name="version" type="text" class="form-control" placeholder="" required>
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
<div class="row gx-lg-5">
    <div class="d-none d-lg-block col-lg-3">
        <ul class="nav nav-pills nav-vertical">
            <li class="nav-item">
                <a class="nav-link active">
                    Current Version :
                    <span class="badge bg-teal ms-auto">
                        {{ $currentver }}
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-lg-9">
        <div class="card card-lg">
            <div class="card-body">
                <div class="markdown">
                    <div>
                        <div class="d-flex mb-3">
                            <h1 class="m-0">Changelog</h1>
                        </div>
                    </div>
                    @foreach ($changelogs as $changelog)
                    <div class="mb-4">
                        <div class="mb-2">
                            <span class="badge bg-blue-lt">{{ $changelog->version }}</span> –
                            <small class="text-muted">{{ $changelog->created_at }}</small>
                        </div>
                        <p class="strong">{{ $changelog->title }}</p>
                        {!! $changelog->description !!}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {

        var quill = new Quill('#content', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, false]
                    }],
                    ['bold', 'italic'],
                    ['link', 'blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ]
            },
            theme: 'snow' // or 'bubble'
        });

        quill.on('text-change', function (delta, oldDelta, source) {
            $('#content-textarea').text($(".ql-editor").html());
        });
    });

</script>
@endsection
