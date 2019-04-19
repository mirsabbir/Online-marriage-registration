<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_eng');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('no');
            $table->string('district');
            $table->string('division');
            $table->string('upozilla');
            $table->date('dob');
            $table->integer('age');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('nids');
    }
}
