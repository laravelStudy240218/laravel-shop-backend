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
        Schema::create('ip_blacklists', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->comment('ip');
            $table->enum('block_type',['everlasting','temporary'])->comment('block 타입');
            $table->dateTime('expired_date')->comment('block 해제 일자');
            $table->string('reason')->comment('차단 사유');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_blacklists');
    }
};
