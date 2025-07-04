<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->date('date')->after('mood_type');
        });
    }

    public function down()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};
