// properties migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration {
    public function up(): void {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('cadastral')->nullable();
            $table->float('area')->nullable();
            $table->string('inventory_no')->nullable();
            $table->json('extras')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('properties');
    }
}