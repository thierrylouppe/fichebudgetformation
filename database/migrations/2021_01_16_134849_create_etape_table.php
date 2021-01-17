<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etape', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('action_id')->constrained('action');
            $table->foreignId('responsable_id')->constrained('users');
            $table->timestamps();
        });

        //activation des contraite 
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etape', function (Blueprint $table) {
            $table->dropConstrainedForeignId("action_id");
            $table->dropConstrainedForeignId("responsable_id");
         });

        Schema::dropIfExists('etape');
    }
}
