<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->string('no_transaksi')->unique();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggan')
                ->cascadeOnDelete();

            $table->foreignId('layanan_id')
                ->constrained('layanan')
                ->cascadeOnDelete();

            $table->decimal('berat', 8, 1);

            $table->boolean('diantar')->default(false);
            $table->integer('ongkir')->default(0);

            $table->integer('total');

            $table->enum('status', [
                'Diproses',
                'Selesai',
                'Diantar',
                'Diambil'
            ])->default('Diproses');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
