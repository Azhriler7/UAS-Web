<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_pengunjung');
            $table->integer('umur');
            $table->string('asal');
            $table->string('kewarganegaraan');
            $table->timestamp('tgl_kunjungan')->useCurrent();
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjung');
    }
};