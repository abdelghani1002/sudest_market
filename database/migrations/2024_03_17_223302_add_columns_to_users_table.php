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
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('job')->nullable();
            $table->string('photo_src')->nullable()->default('public/default_user_photo.png');
            $table->enum('status', ['new', 'active', 'inactive', 'banned'])->default('new');
            $table->timestamp('last_seen_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('job');
            $table->dropColumn('photo_src');
            $table->dropColumn('status');
            $table->dropColumn('last_seen_at');
        });
    }
};
