// templates migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration {
    public function up(): void {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['LEASE', 'SUBLEASE', 'TRANSFER_ACT']);
            $table->string('version')->default('1.0');
            $table->json('tags')->nullable();
            $table->foreignId('file_id')->constrained('files');
            $table->json('fields_detected')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('templates');
    }
}