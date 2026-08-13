<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('content')->nullable()->after('excerpt');
            $table->string('image')->nullable()->after('status');
            $table->date('published_at')->nullable()->after('date');
            $table->integer('read_time')->nullable()->after('published_at');
            $table->string('url')->nullable()->after('read_time');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['content', 'image', 'published_at', 'read_time', 'url']);
        });
    }
};
