<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverviewTable extends Migration
{
    public function up()
    {
        Schema::create('overview', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->integer('number')->nullable();
            $table->string('n_heading')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('overview');
    }
}
