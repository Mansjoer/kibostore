@extends('admin.layouts.master')

@section('title')
Accounting
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search Data...">
        <a href="#add-flows" class="btn btn-primary" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Data
        </a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="add-flows" aria-labelledby="offcanvasEndLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasEndLabel">Add New Data</h2>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('accounting-add') }}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input name="description" type="text" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3">
                              <div class="form-label">Type</div>
                              <select name="type" class="form-select">
                                <option value="Income">Income</option>
                                <option value="Expenses">Expenses</option>
                              </select>
                            </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input name="amount" type="number" class="form-control" placeholder="" required>
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
                            <th class="text-center" style="width:20%">Created By</th>
                            <th class="text-center" style="width:40%">Description</th>
                            <th class="w-1 text-center">Type</th>
                            <th class="w-1 text-center">Amount</th>
                            <th class="w-1 text-center">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databook as $data)
                        <tr>
                            <td class="text-center" data-label="Added By">
                                {{ $data->users->name }}
                            </td>
                            <td class="text-muted text-center" data-label="Description">
                                {{ $data->description }}
                            </td>
                            @if ($data->type == 'Income')
                            <td class="text-green text-center" data-label="Type">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="16" y1="15" x2="12" y2="19"></line>
                                        <line x1="8" y1="15" x2="12" y2="19"></line>
                                    </svg>
                                    {{ $data->type }}
                                </span>
                            </td>
                            @else
                            <td class="text-red text-center" data-label="Type">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <line x1="12" y1="5" x2="12" y2="19"></line>
                                       <line x1="16" y1="9" x2="12" y2="5"></line>
                                       <line x1="8" y1="9" x2="12" y2="5"></line>
                                    </svg>
                                    {{ $data->type }}
                                </span>
                            </td>
                            @endif
                            <td class="text-muted text-center" data-label="Amount">
                                Rp. {{ number_format($data->amount, 0) }}
                            </td>
                            <td class="text-muted text-center" data-label="Type">
                                {{ $data->created_at }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $databook->links('admin.includes._pagination1') }}
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#roles').DataTable();
    });

</script>
@endsection
