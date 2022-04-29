<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->string('photo')->default('photo.png');
            $table->string('brand');
            $table->string('version');
            $table->string('engine');
            $table->string('color');
            $table->string('matricule');
            $table->string('kilometrage');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('cars');
    }
}
