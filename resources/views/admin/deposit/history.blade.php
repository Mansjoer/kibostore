@extends('admin.layouts.master')

@section('title')
Deposit History
@endsection

@section('searchbar')
<div class="col-auto ms-auto d-print-none">
    <div class="d-flex">
        <a href="{{ route('deposit') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Deposit
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cards">
    <div class="col-sm-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table display" id="roles">
                    <thead>
                        <tr>
                            <th class="text-center">Account Owner Name</th>
                            <th class="text-center">Bank Name</th>
                            <th class="text-center">Bank Account Name</th>
                            <th class="text-center">Bank Account Number Destination</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Notes</th>
                            <th class="text-center">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($deposithistory->count() == 0)
                        <td colspan="8" class="text-center">
                            No Deposit History.
                        </td>
                        @endif
                        @foreach ($deposithistory as $history)
                        <tr>
                            <td class="text-center" data-label="Account Owner Name">
                                {{ $history->owner_name }}
                            </td>
                            <td class="text-muted text-center" data-label="Bank Name">
                                {{ $history->bank }}
                            </td>
                            <td class="text-muted text-center" data-label="Bank Account Name">
                                @if ($history->bank == 'BRI') DIGIFLAZZ INTERKONEK
                                @else PT DIGIFLAZZ INTERKONEKSI INDONESIA
                                @endif
                            </td>
                            <td class="text-muted text-center" data-label="Bank Account Number Destination">
                                @if ($history->bank == 'BCA') 6042 8888 90
                                @elseif ($history->bank == 'MANDIRI') 155 00 0991011 1
                                @elseif ($history->bank == 'BRI') 2135 01 000291 30 7
                                @endif
                            </td>
                            <td class="text-muted text-center" data-label="Amount">
                                {{ number_format($history->amount, 0) }}
                            </td>
                            <td class="text-muted text-center" data-label="Notes">
                                {{ $history->note }}
                            </td>
                            <td class="text-muted text-center" data-label="Created At">
                                {{ \Carbon\Carbon::parse($history->created_at)->diffForHumans() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $deposithistory->links('admin.includes._pagination1') }}
</div>
@endsection
