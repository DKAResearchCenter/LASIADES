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
            $table->bigInteger("no_kk");
            $table->string("nama",30);
            $table->string("email",20);
            $table->string("phone",30);
            $table->enum("jenis_kelamin",["PEREMPUAN","LAKI-LAKI"])->change();
            $table->string("penghasilan_perbulan");
            $table->string("file");
            $table->enum("status",["BELUM DIPROSES","DIPROSES","BATAL","SELESAI"])->change();
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
