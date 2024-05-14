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
        Schema::create('surat_tidakmampu', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger("kk");
            $table->bigInteger("ktp");
            $table->integer("id_user")->nullable();
            $table->string("nama",200);
            $table->string("email",50);
            $table->string("phone",30);
            $table->string("tempat_lahir")->nullable()->default("MAMASA");
            $table->date("tanggal_lahir")->nullable()->default("1982-01-01");
            $table->string("agama")->nullable()->default("ISLAM");
            $table->string("alamat")->nullable()->default("Desa Minanga, Kec. Bambang, Kab. Mamasa");
            $table->enum("jenis_kelamin",["PEREMPUAN","LAKI-LAKI"])->default("LAKI-LAKI");
            $table->string("penghasilan_perbulan",90);
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
        Schema::dropIfExists('surat_tidakmampu');
    }
};
