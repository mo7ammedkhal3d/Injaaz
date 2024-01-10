<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_user_id')->constrained('users');
            $table->foreignId('recipient_user_id')->constrained('users');
            $table->foreignId('board_id')->constrained(); 
            $table->text('text');
            $table->enum('status', ['inprogress', 'reject', 'confirm'])->default('inprogress');
            $table->boolean('inbox')->default(true); 
            $table->boolean('readed')->default(false); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
