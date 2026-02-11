<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {

            $table->string('invoice_number')->nullable()->after('status');
            $table->string('invoice_file')->nullable()->after('invoice_number');

            $table->enum('status_pembayaran', [
                'unpaid',
                'waiting_verification',
                'paid'
            ])->default('unpaid')->after('invoice_file');

        });
    }

    public function down(): void
    {
        Schema::table('reservasis', function (Blueprint $table) {
            $table->dropColumn([
                'invoice_number',
                'invoice_file',
                'status_pembayaran'
            ]);
        });
    }
};
