{{-- resources/views/vat-invoice/add.blade.php --}}
@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase"> Create VAT Invoice </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('include.alert')

                    <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                    <hr>
                    <form action="{{ route('create-vat-invoice') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Party</label>
                                    <select class="form-control border-bottom" required name="party_id">
                                        <option value="">Please select</option>
                                        @foreach($parties as $party)
                                        <option value="{{ $party->id }}">{{ $party->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Date</label>
                                    <input type="date" required name="invoice_date" class="form-control border-bottom" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>Invoice Number</label>
                                    <input type="text" required value="{{ $invoice_no }}" name="invoice_no" class="form-control border-bottom" placeholder="Enter Invoice number">
                                </div>
                            </div>
                        </div>

                        <h4 class="header-title text-uppercase mt-3">Item Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-8 border p-1 text-center"><b>DESCRIPTIONS</b></div>
                            <div class="col-md-4 border p-1 text-center"><b>TOTAL AMOUNT (BDT)</b></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8 border p-2">
                                <textarea class="form-control" required name="item_description" placeholder="Enter description"></textarea>
                            </div>
                            <div class="col-md-4 border p-2">
                                <input class="form-control" required type="number" step="0.01" name="total_amount" id="totalAmountInput" placeholder="Enter BDT amount" oninput="calculateNetAmount()">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-9">
                                <label>VAT (%)</label>
                                <input type="number" step="0.01" class="form-control border-bottom" placeholder="VAT Rate" name="vat_rate" id="vatRate" oninput="calculateNetAmount()">
                            </div>
                            <div class="col-md-3">
                                <ul style="list-style: none; float: right; padding-left: 0;">
                                    <li><b>Subtotal:</b> ৳ <span id="totalAmountDisplay">0.00</span></li>
                                    <li><b>VAT:</b> ৳ <span id="taxDisplay">0.00</span><input type="hidden" value="0" name="vat_amount" id="vatAmount"></li>
                                    <hr>
                                    <li><b>Net Amount:</b> ৳ <span id="netAmountDisplay">0.00</span><input type="hidden" value="0" name="net_amount" id="netAmount"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="declaration" class="form-control border-bottom" placeholder="Declaration">
                                </div>
                                <button type="submit" class="btn btn-primary float-right mb-2">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function calculateNetAmount() {
        const totalAmountInput = document.getElementById('totalAmountInput');
        const vatRateInput = document.getElementById('vatRate');

        const totalAmount = parseFloat(totalAmountInput.value) || 0;
        const vatRate = parseFloat(vatRateInput.value) || 0;

        const vatAmount = (totalAmount * vatRate) / 100;
        const netAmount = totalAmount + vatAmount;

        document.getElementById('totalAmountDisplay').textContent = totalAmount.toFixed(2);
        document.getElementById('taxDisplay').textContent = vatAmount.toFixed(2);
        document.getElementById('netAmountDisplay').textContent = netAmount.toFixed(2);

        document.getElementById('vatAmount').value = vatAmount.toFixed(2);
        document.getElementById('netAmount').value = netAmount.toFixed(2);
    }
</script>
@endpush
