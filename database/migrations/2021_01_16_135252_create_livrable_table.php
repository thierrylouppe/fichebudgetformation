<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livrable', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('etape_id')->constrained('etape');
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
        Schema::table('livrable', function (Blueprint $table) {
            $table->dropConstrainedForeignId("etape_id");
         });

        Schema::dropIfExists('livrable');
    }
}
