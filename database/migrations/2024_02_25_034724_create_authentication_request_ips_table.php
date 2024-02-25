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
        Schema::create('table_authentication_request_ips', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->comment('인증요청 ip');
            $table->boolean('authorized')->comment('인가 여부');
            $table->string('token')->comment('해당 ip로 발급된 토근');
            $table->dateTime('expiration_date')->comment('만료일자');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_authentication_request_ips');
    }
};
