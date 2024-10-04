<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeImgColumnTypeInHomesTable extends Migration
{
    public function up(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->json('img')->change(); // Mengubah kolom img menjadi json
        });
    }

    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->longText('img')->change(); // Kembalikan ke longtext jika diperlukan
        });
    }
}
