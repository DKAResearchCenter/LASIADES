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
        Schema::create('data_kabupaten', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("id_negara");
            $table->bigInteger("id_provinsi");
            $table->string("nama",100);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('data_kabupaten')->insert(
            array(
                'id' => 75670,
                'id_negara' => 101,
                'id_provinsi' => 75425,
                'nama' => 'MAMASA'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kabupaten');
    }
};
