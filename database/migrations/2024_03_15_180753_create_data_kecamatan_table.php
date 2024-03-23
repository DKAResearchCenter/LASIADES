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
        Schema::create('data_kecamatan', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("id_negara");
            $table->bigInteger("id_provinsi");
            $table->bigInteger("id_kabupaten");
            $table->string("nama",100);
            $table->timestamps();
        });

        DB::table('data_kecamatan')->insert(
            array(
                'id' => 75811,
                'id_negara' => 101,
                'id_provinsi' => 75425,
                'id_kabupaten' => 75670,
                'nama' => 'BAMBANG'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kecamatan');
    }
};
