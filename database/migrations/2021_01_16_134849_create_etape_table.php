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
            $table->foreignId('action_id')->constrained('action');
            $table->string('budget');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('livrable_attendus');
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
         });

        Schema::dropIfExists('etape');
    }
}
