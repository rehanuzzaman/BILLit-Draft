{{-- resources/views/gst-bill/index.blade.php --}}
@extends('layout.app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">Manage Bills</h2>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <!--Include alert file-->
            @include('include.alert')

            <div class="card-box">
                <a href="{{ route('add-gst-bill') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Create New Bill
                </a>
                <h4 class="header-title mb-4 text-uppercase">All Bills</h4>

                <table id="basic-datatable" class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Invoice No</th>
                            <th>Client's Info</th>
                            <th>Billing Info</th>
                            <th>Invoice Date</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($bills as $index => $bill)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $bill->invoice_no }}</td>
                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Name:</b> <span> {{ $bill->party->full_name ?? 'N/A' }}</span></li>
                                    <li><b>Phone:</b> <span> {{ $bill->party->phone_no ?? 'N/A' }}</span></li>
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Total Amount:</b> <span>₹{{ number_format($bill->total_amount, 2) }}</span></li>
                                    <li><b>TAX:</b> <span>₹{{ number_format($bill->tax_amount, 2) }}</span></li>
                                    <li><b>Net Amount:</b> <span>₹{{ number_format($bill->net_amount, 2) }}</span></li>
                                </ul>
                            </td>

                            <td>{{ \Carbon\Carbon::parse($bill->invoice_date)->format('d-m-Y') }}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- SECURE DELETE FORM --}}
                                        <form action="{{ route('delete-gst-bill', $bill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this bill?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete
                                            </button>
                                        </form>
                                        <a class="dropdown-item" href="{{ route('print-gst-bill', $bill->id) }}"><i class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>Print</a>
                                        <a class="dropdown-item" href="{{ route('print-gst-bill', ['id' => $bill->id, 'currency' => 'usd']) }}"><i class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>Print USD Bill</a>
                                    </div>
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