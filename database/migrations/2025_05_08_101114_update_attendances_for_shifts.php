<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('day_note')->nullable()->after('user_id');
            $table->time('morning_in')->nullable();
            $table->time('morning_out')->nullable();
            $table->time('afternoon_in')->nullable();
            $table->time('afternoon_out')->nullable();
            $table->time('evening_in')->nullable();
            $table->time('evening_out')->nullable();
    
            $table->dropColumn(['checked_in_at', 'checked_out_at']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamp('checked_out_at')->nullable();
    
            $table->dropColumn([
                'day_note',
                'morning_in', 'morning_out',
                'afternoon_in', 'afternoon_out',
                'evening_in', 'evening_out'
            ]);
        });
    }
};
