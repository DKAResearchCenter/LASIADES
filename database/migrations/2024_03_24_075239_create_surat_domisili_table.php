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
        Schema::create('surat_domisili', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger("no_kk");
            $table->string("alamat",200);
            $table->string("nik_pemohon",20);
            $table->string("nama_lengkap",30);
            //##################
            $table->string("alasan_pindah",100);
            $table->string("alamat_tujuan",200);
            $table->string("klarifikasi_pindah",100);
            $table->string("jenis_kepindahan",100);
            $table->string("status_kk_tidak_pindah",100);
            $table->string("status_kk_yang_pindah",100);
            //####################################################
            $table->string("keluarga_pindah_nik",100);
            $table->string("keluarga_pindah_nama",100);
            $table->string("keluarga_pindah_tempat_lahir",100);
            $table->string("keluarga_pindah_tanggal_lahir",100);
            //####################################################
            $table->string("file")->nullable();
            $table->enum("status",["BELUM DIPROSES","DIPROSES","BATAL","SELESAI"])->default("BELUM DIPROSES");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_domisili');
    }
};
