<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('judul',50);
            $table->ipAddress('tahun',4)->nullable();
            $table->foreignid('id_penulis')->constrained('penulis')->onUpdate('cascade')->onDelete('cascade');
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
