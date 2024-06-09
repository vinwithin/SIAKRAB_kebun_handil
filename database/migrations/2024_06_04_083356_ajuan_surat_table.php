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
        Schema::create('ajuan_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju');
            $table->string('NIK');
            $table->string('NoWa');
            $table->text('Alamat');
            $table->foreignId('kategori_surat_id');
            $table->text('KTP');
            $table->text('PBB');
            $table->text('KK');
            $table->text('surat_pengantar_rt');
            $table->string('status');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
