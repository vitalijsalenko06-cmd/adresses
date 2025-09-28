// presets migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresetsTable extends Migration {
    public function up(): void {
        Schema::create('presets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('dpi')->default(300);
            $table->enum('color_mode', ['bilevel', 'grayscale'])->default('grayscale');
            $table->enum('compression', ['CCITT_G4', 'LZW', 'ZSTD'])->default('LZW');
            $table->string('effects_profile')->default('Scan Default');
            $table->boolean('strip_exif')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('presets');
    }
}