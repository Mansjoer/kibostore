@extends('admin.layouts.master')

@section('title')
Order History
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-sm-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table display" id="roles">
                    <thead>
                        <tr>
                            <th class="text-center">Product Code</th>
                            <th class="text-center">Account Data</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Invoice Id</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Created At</th>
                            <th class="w-1 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orderList->count() == 0)
                        <td colspan="7" class="text-center">
                            No Order History.
                        </td>
                        @endif
                        @foreach ($orderList as $data)
                        <tr>
                            <td class="text-center" data-label="Name">
                                {{ $data->product_sku }}
                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                {{ $data->customer_no }}
                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                <span class="badge text-end @if ($data->status == 'Sukses') text-green bg-green-lt @elseif ($data->status == 'Pending') text-yellow bg-yellow-lt @elseif ($data->status == 'Gagal')text-red bg-red-lt @elseif ($data->status == 'Waiting')text-yellow bg-yellow-lt @endif">@if ($data->status == 'Sukses') Success @elseif ($data->status == 'Pending') Pending @elseif ($data->status == 'Gagal') Canceled @elseif ($data->status == 'Waiting') Waiting @endif</span>
                            </td>
                            <td class="text-center" data-label="Name">
                                <a href="/admin/invoice/{{ $data->slug }}">{{ $data->slug }}</a>
                            </td>
                            <td class="text-center" data-label="Name">
                                Rp. {{ number_format($data->price) }}
                            </td>
                            <td class="text-center" data-label="Name">
                                {{ $data->created_at }}
                            </td>
                            <td class="text-center col-auto">
                                <div class="btn-list flex-nowrap">
                                    <a href="/admin/invoice/{{ $data->slug }}" class="btn">
                                        View Invoice
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
    {{ $orderList->links('admin.includes._pagination1') }}
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#roles').DataTable();
    });

</script>
@endsection
