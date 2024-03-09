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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('body', 255);
        $table->binary('image');
        $table->foreignId('user_id')->nullable();
        $table->timestamps();
        $table->charset = 'utf8mb4'; // 캐릭터셋을 utf8mb4로 지정
        $table->collation = 'utf8mb4_general_ci'; // 콜레이션을 utf8mb4_general_ci로 지정
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
