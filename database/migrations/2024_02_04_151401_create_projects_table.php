<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('localizacao');
            $table->string('cliente');
            $table->string('escopo_inicial');
            $table->string('data_inicio');
            $table->string('slug');
            $table->boolean('ativo')->default(1);

            // $table->unsignedBigInteger('usuario_id');
            // $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade');
            // $table->unsignedBigInteger('status_id')->nullable();
            // $table->foreign('status_id')->nullable()->references('id')->on('status')->onUpdate('cascade');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->nullable()->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
