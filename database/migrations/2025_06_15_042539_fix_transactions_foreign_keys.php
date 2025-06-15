<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Hapus constraint lama
            $table->dropForeign(['cart_id']);

            // Ubah kolom cart_id agar sesuai dengan referensi yang benar
            $table->unsignedBigInteger('cart_id')->change();

            // Tambahkan foreign key baru yang merujuk ke cart_items
            $table->foreign('cart_id')->references('id')->on('cart_items')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            // Kembalikan ke constraint lama jika diperlukan
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }
};
