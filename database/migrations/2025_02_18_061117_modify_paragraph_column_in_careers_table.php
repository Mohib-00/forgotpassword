<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->text('paragraph')->change(); 
        });
    }

    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('paragraph', 255)->change(); 
        });
    }
};
