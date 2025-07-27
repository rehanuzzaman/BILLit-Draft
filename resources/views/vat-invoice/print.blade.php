@extends('layout.app')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Invoice</h4>
                    </div>
                </div>
            </div>

            <!-- Invoice Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                        <!-- Company Info -->
                        <div class="clearfix text-center">
                            <h1>ABC Company</h1>
                            <div>
                                <span>Bikaner-334001 (Raj.) India</span><br>
                                <span><b>Email:</b> abc@gmail.com | <b>Web:</b> www.abc.com | <b>Mob:</b> +919601230111</span>
                            </div>
                            <div class="row pt-3 pb-1">
                                <div class="col-6 text-right">
                                    <span><b>PAN NO:</b> TEST02984</span>
                                </div>
                                <div class="col-6">
                                    <span><b>GSTIN NO:</b> TEST92895C0DE3</span>
                                </div>
                            </div>
                        </div>

                        <!-- GST INVOICE Header -->
                        <div class="row">
                            <div class="col-12 text-center border">
                                <h3 class="m-1 font-weight-bold">GST INVOICE</h3>
                            </div>
                        </div>

                        <!-- Client and Invoice Details -->
                        <div class="row text-center">
                            <div class="col-md-6 border p-0">
                                <div class="border-bottom"><h5><b>Details of the Client | Billed to</b></h5></div>
                                <div class="row pl-2 pt-1">
                                    <div class="col-12">
                                        <label>Name:</label>
                                        <span>{{ $bill->party->full_name }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12">
                                        <label>Address:</label>
                                        <span>{{ $bill->party->address }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12">
                                        <label>Phone:</label>
                                        <span>{{ $bill->party->phone }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2 pb-1">
                                    <div class="col-9">
                                        <label>State:</label>
                                        <span>{{ $bill->party->state }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>State Code:</label>
                                        <span><b>{{ $bill->party->state_code }}</b></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 border p-0">
                                <div class="border-bottom"><h5><b>Invoice Details</b></h5></div>
                                <div class="row pl-2 pt-1">
                                    <div class="col-12">
                                        <label>Reverse Charge:</label>
                                        <span>{{ $bill->reverse_charge }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12">
                                        <label>Invoice No:</label>
                                        <span>{{ $bill->invoice_no }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12">
                                        <label>Invoice Date:</label>
                                        <span>{{ \Carbon\Carbon::parse($bill->invoice_date)->format('d-m-Y') }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2 pb-1">
                                    <div class="col-9">
                                        <label>State:</label>
                                        <span>{{ $bill->state }}</span>
                                    </div>
                                    <div class="col-3">
                                        <label>State Code:</label>
                                        <span><b>{{ $bill->state_code }}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item Table -->
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="table-responsive table-bordered">
                                    <table class="table mt-4 table-centered border">
                                        <thead>
                                            <tr>
                                                <th style="width: 8%; background-color: #82d2f1; color: black;">SR NO.</th>
                                                <th style="background-color: #82d2f1; color: black;">DESCRIPTION</th>
                                                <th class="text-center" style="width: 15%; background-color: #82d2f1; color: black;">AMOUNT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><b>{{ $bill->item_description }}</b></td>
                                                <td class="text-center">
                                                    @if($currency === 'usd')
                                                        ${{ number_format($bill->total_amount_usd, 2) }}
                                                    @else
                                                        ₹{{ number_format($bill->amount, 2) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Bank & Totals -->
                        <div class="row border">
                            <div class="col-sm-6 col-lg-9 p-0">
                                <div class="pt-2 pb-2 mt-1 mb-1 ml-1 text-center" style="background-color: rgba(218, 218, 218, 0.37); border-radius: 5px;">
                                    <h5><b>Bank Details</b></h5>
                                    <p><b>UCO BANK, ACCOUNT NO:</b> 18000111220033 <b>IFSC:</b> UCBA0001011</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mt-1">
                                <ul class="list-unstyled">
                                    <li><b>Total:</b><span class="float-right">₹{{ number_format($bill->amount, 2) }}</span></li>
                                    <li><b>CGST:</b><span class="float-right">₹{{ number_format($bill->cgst, 2) }}</span></li>
                                    <li><b>SGST:</b><span class="float-right">₹{{ number_format($bill->sgst, 2) }}</span></li>
                                    <li><b>IGST:</b><span class="float-right">₹{{ number_format($bill->igst, 2) }}</span></li>
                                    <li><b>Total GST:</b><span class="float-right">₹{{ number_format($bill->cgst + $bill->sgst + $bill->igst, 2) }}</span></li>
                                    <li><b>Grand Total:</b><span class="float-right">
                                        @if($currency === 'usd')
                                            ${{ number_format($bill->total_amount_usd, 2) }}
                                        @else
                                            ₹{{ number_format($bill->net_amount, 2) }}
                                        @endif
                                    </span></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Print and Navigation -->
                        <div class="mt-4 mb-1 text-right">
                            <i class="mdi mdi-printer mr-0 font-18"></i>
                            <select style="width: 40%; border: none; border-bottom: 1px solid lightgray;">
                                <option value="">All Copies</option>
                                <option value="">Original: Client Copy</option>
                                <option value="">Original: Office Copy</option>
                            </select>
                        </div>
                        <div class="mt-4 mb-1 text-right d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary">Print <i class="mdi mdi-printer mr-1"></i></a>
                            <a href="{{ route('manage-gst-bills') }}" class="btn btn-danger">All Bills <i class="fas fa-rupee-sign"></i></a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>