<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Customer info
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('postcode');
            $table->string('country');

            // Order info
            $table->string('order_number')->unique();
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method')->nullable();
            $table->enum('status', ['pending', 'completed', 'declined'])->default('pending');

            // Optional metadata
            $table->text('notes')->nullable();
            $table->boolean('paid')->default(false);
            $table->timestamp('paid_when')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};