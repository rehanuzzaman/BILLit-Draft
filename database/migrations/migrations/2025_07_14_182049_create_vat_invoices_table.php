<?php
// database/migrations/2025_07_14_182049_create_gst_bills_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstBillsTable extends Migration
{
    public function up()
    {
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->integer("party_id")->nullable();
            $table->date("invoice_date")->nullable();
            $table->string("invoice_no")->unique();
            $table->text("item_description")->nullable();
            $table->float("total_amount", 10, 2)->nullable();
            $table->float("total_amount_usd", 10, 2)->nullable();
            $table->float("cgst_rate", 10, 2)->nullable();
            $table->float("sgst_rate", 10, 2)->nullable();
            $table->float("igst_rate", 10, 2)->nullable();
            $table->float("cgst_amount", 10, 2)->nullable();
            $table->float("sgst_amount", 10, 2)->nullable();
            $table->float("igst_amount", 10, 2)->nullable();
            $table->float("tax_amount", 10, 2)->nullable();
            $table->float("net_amount", 10, 2)->nullable();
            $table->text("declaration")->nullable();
            // $table->tinyInteger("is_deleted")->default(0); // <-- This is removed
            $table->timestamps();
            $table->softDeletes(); // <-- This is added
        });
    }

    public function down()
    {
        Schema::dropIfExists('gst_bills');
    }
}
