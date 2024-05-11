<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->index('name', 'user_name_index');  
            $table->index('email', 'user_email_index'); 
            $table->index('role', 'user_role_index'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('user_name_index'); 
            $table->dropIndex('user_email_index'); 
            $table->dropIndex('user_role_index');  
        });
    }
};
