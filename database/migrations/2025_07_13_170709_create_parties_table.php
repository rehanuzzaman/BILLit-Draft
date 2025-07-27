<?php
// database/migrations/2025_07_13_170709_create_parties_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->enum("party_type", ['vendor', 'client', 'employee'])->nullable();
            $table->string("full_name", 100)->nullable();
            $table->string("phone_no", 15)->nullable();
            $table->text("address")->nullable();
            $table->string("account_holder_name")->nullable();
            $table->string("account_no")->nullable();
            $table->string("bank_name")->nullable();
            $table->string("ifsc_code")->nullable();
            $table->string("zip_code")->nullable();
            $table->string("state")->nullable();
            $table->text("branch_address")->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- Use Laravel's soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('parties');
    }
}