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
        Schema::create('data_provinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("id_negara");
            $table->string("nama",100);
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('data_provinsi')->insert(
            array(
                'id' => 75425,
                'id_negara' => 101,
                'nama' => 'SULAWESI BARAT'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_provinsi');
    }
};
