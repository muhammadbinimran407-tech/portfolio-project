<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('description')->nullable()->after('category');
            $table->string('name')->nullable()->after('title'); // alias for title
            $table->string('technologies')->nullable()->after('tech'); // or use tech
            $table->string('image')->nullable()->after('demo');
            $table->integer('stars')->nullable()->after('image');
            $table->integer('forks')->nullable()->after('stars');
            $table->string('url')->nullable()->after('github'); // alias for demo
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['description', 'name', 'technologies', 'image', 'stars', 'forks', 'url']);
        });
    }
};
