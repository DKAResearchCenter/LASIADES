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
        Schema::create('data_negara', function (Blueprint $table) {
            $table->increments('id');
            $table->string("kode",4);
            $table->string("nama",100);
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('data_negara')->insert(
            array(
                'id' => 101,
                'kode' => 'ID',
                'nama' => 'INDONESIA'
            )
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_negara');
    }
};
