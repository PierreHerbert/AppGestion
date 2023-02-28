<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_operation_id'); // colonne qui lie l'operationa un id de categorie d'operation
            $table->string('nature');
            $table->decimal('montant');
            $table->date('date');
            $table->boolean('type_operation');
            $table->timestamps();
            
            //liens avec la table categorie_operation
            $table->foreign('categorie_operation_id')
                ->references('id')
                ->on('categorie_operation')
                ->onDelete('cascade');

            //liens avec la table client
            $table->foreignid('client_id')
            ->nullable()
            ->constrained('client')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation');
    }
};
