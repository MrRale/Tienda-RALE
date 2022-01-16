<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//para saber a quien se va a facturar la venta
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',10)->unique();
            $table->string('ruc',13)->unique()->nullable();
            $table->string('telefono')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->datetime('fecha');
            $table->longText('descripcion')->nullable();
            $table->integer('cantidad')->default(0);
            $table->decimal('total')->default(0);
            $table->string('estado_pedido')->default('pendiente');
            $table->string('empresa')->nullable();
            $table->string('ciudad');
            $table->string('codigopostal');
            $table->text('direccion');
            $table->decimal('costo_envio')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();//para saber quien hizo la venta
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('factura_id')->nullable();
            $table->foreign('factura_id')->references('id')->on('facturas')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ordens');
    }
}
