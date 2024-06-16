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
            // Add new columns
            $table->string('firstname')->after('id');
            $table->string('lastname')->after('firstname');

            // Remove existing columns
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add columns back in the reverse migration
            $table->string('name')->after('id');
            $table->timestamp('email_verified_at')->nullable()->after('email');

            // Remove the new columns
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
        });
    }
};
