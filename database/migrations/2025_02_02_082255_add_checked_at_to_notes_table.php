<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->date('checked_at')->nullable();  // Menyimpan tanggal ketika dicentang
        });
    }
    
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('checked_at');
        });
    }
    
};
