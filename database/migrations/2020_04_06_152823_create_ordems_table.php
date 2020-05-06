<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemsTable extends Migration
{

    public function up()
    {
        Schema::create('ordems', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('clinic_id');
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->string('dia',2);
            $table->string('mes',2);
            $table->string('ano',4);
            $table->text('problema');
            $table->text('solucao');
            $table->enum('avaliacao', ['bom','otimo','medio','ruim','pessimo'])->nullable()->default(null);
            $table->text('feedback');
            $table->enum('type',['revisao','problema']);
            $table->enum('status',['aberto','fechado']);
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
        Schema::dropIfExists('ordems');
    }
}
