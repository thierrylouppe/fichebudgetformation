<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->id();
            $table->foreignId('direction_id')->constrained("direction");
            $table->string('nom');
            $table->string('objectif');
            $table->foreignId('responsable_id')->constrained('users');
            $table->string('impact');
            $table->timestamps(); 
        });
 
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action', function (Blueprint $table) {
           $table->dropConstrainedForeignId("direction_id");
           $table->dropConstrainedForeignId("responsable_id");
        });
        
        Schema::dropIfExists('action');
    }
}
