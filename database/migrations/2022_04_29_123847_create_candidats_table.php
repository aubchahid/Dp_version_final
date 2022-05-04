<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('school_id')->constrained('schools')->onUpdate('cascade')->onDelete('cascade');
            $table->string('photo')->default('photo.png');
            $table->string('phoneNo');
            $table->string('birthdate');
            $table->string('sexe');
            $table->string('cni');
            $table->string('cniRecto');
            $table->string('cniVerso');
            $table->string('contrat');
            $table->string('certificat');
            $table->integer('tarifs');
            $table->integer('paid')->default(0);
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
        Schema::dropIfExists('candidats');
    }
}
