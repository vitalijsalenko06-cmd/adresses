// files migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('type'); // docx, pdf, tiff, json, etc.
            $table->string('sha256')->nullable(); // для контроля целостности
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('files');
    }
}