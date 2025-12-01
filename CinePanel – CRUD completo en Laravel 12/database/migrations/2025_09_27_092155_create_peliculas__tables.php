<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // autoincremental, PK
            $table->string('nombre', 60);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('idcategoria')->unique();
            $table->string('nombre', 50);

        });

        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('idpelis')->unique();
            $table->string('titulo', 60);
            $table->string('direccion', 200);
            $table->year('año');
            $table->string('sinopsis', 300);
            $table->string('portada', 100);
            $table->timestamp('fecha_alta')->useCurrent();
            $table->unsignedInteger('idcategoria');
            $table->foreign('idcategoria')->references('idcategoria')->on('categorias')->onDelete('cascade');

        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula');
        Schema::dropIfExists('users');
    }
};
