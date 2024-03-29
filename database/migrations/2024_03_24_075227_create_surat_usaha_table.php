<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_usaha', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_user")->nullable();
            $table->bigInteger("nik");
            $table->string("nama", 20);
            $table->string("email");
            $table->string("phone",30);
            $table->enum("jenis_kelamin",["PEREMPUAN","LAKI-LAKI"])->nullable();
            $table->string("pekerjaan");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("alamat",50);
            $table->string("file")->nullable();
            $table->enum("status",["BELUM DIPROSES","DIPROSES","BATAL","SELESAI"])->default("BELUM DIPROSES");
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('surat_usaha')->insert(
            array(
                'nik' => "73720823822200001",
                'nama' => "Midle",
                'email' => "admin@gmail.com",
                'phone' => "123456788990",
                "jenis_kelamin" => "PEREMPUAN",
                "pekerjaan" => "WIRASWASTA",
                "tempat_lahir" => "POLEWALI",
                "tanggal_lahir" => "2024-05-01",
                "alamat" => "Jl, Kebangsaaan Raya",
                'status' => "BELUM DIPROSES"
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_usaha');
    }
};
