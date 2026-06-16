<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('hero_image_3_url')->nullable()->after('hero_theme');
            $table->string('hero_image_4_url')->nullable()->after('hero_image_3_url');
            $table->text('extra_hero_images')->nullable()->after('hero_image_4_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn(['hero_image_3_url', 'hero_image_4_url', 'extra_hero_images']);
        });
    }
};
