<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('Judul');
            $table->date('Tanggal'); //Can you save it? 
            $table->string('Deskripsi'); 
            $table->string('Bukti'); //Should be pdf format -> pre/post Proposal
            $table->enum('Jenis_Bukti', ['SK', 'Proposal', 'LPJ']);
            $table->string('Foto'); //Should be photo format
            $table->enum('Status', ['Individu', 'BEM', 'HMPSSI', 'HMPTI', 'Senat']);
            $table->enum('Kevalidan', ['Menunggu validasi', 'Valid', 'Invalid']);
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
        Schema::dropIfExists('kegiatans');
    }
}
