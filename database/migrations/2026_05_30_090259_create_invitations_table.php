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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('template');
            $table->string('bride_name');
            $table->string('groom_name');
            $table->string('wedding_date');
            $table->string('time');
            $table->string('venue_name');
            $table->text('venue_address');
            $table->string('rsvp_contact');
            $table->string('rsvp_deadline')->nullable();
            $table->string('dress_code')->nullable();
            $table->string('personal_message', 255)->nullable();
            $table->longText('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
