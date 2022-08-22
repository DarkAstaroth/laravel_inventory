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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->integer('proveedor_id');
            $table->integer('marca_id');
            $table->integer('producto_id');
            $table->string('compra_nro');
            $table->date('fecha');
            $table->string('description')->nullable();
            $table->integer('compra_cantidad');
            $table->integer('precio_unitario');
            $table->integer('precio_compra');
            $table->tinyInteger('status')->default('0')->comment('0 = pendiente ; 1 = Aprovado');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('compras');
    }
};
