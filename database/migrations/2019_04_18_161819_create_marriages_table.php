<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marriages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groom_id');
            $table->integer('bride_id');
            $table->integer('witness1_id');
            $table->integer('witness2_id');
            $table->string('religion');
            $table->integer('prv_groom_id')->nullable();
            $table->string('prv_bride_id')->nullable();
            $table->string('dowry')->default('0');
            $table->string('dowry_paid')->default('0');
            $table->integer('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marriages');
    }
}
