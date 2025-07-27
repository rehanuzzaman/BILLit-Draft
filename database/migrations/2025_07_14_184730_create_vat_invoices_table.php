<?php
// database/migrations/2025_07_14_182049_create_vat_invoices_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('vat_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained()->onDelete('cascade');
            $table->date("invoice_date")->nullable();
            $table->string("invoice_no")->unique();
            $table->text("item_description")->nullable();
            $table->decimal("total_amount", 10, 2)->default(0);
            $table->decimal("vat_rate", 5, 2)->nullable();
            $table->decimal("vat_amount", 10, 2)->nullable();
            $table->decimal("net_amount", 10, 2)->default(0);
            $table->text("declaration")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vat_invoices');
    }
}