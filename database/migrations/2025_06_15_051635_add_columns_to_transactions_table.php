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
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('quantity')->after('product_id');
            $table->decimal('item_price', 10, 2)->after('quantity');
            $table->decimal('subtotal', 10, 2)->after('total');
            $table->decimal('shipping_cost', 10, 2)->after('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['quantity', 'item_price', 'subtotal', 'shipping_cost']);
        });
    }
};
