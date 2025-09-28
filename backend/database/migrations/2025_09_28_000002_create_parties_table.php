// parties migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration {
    public function up(): void {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['LANDLORD', 'SUBLANDLORD', 'TENANT']);
            $table->enum('kind', ['ORG', 'IP', 'FIZ']);
            $table->string('name');
            $table->string('inn')->nullable();
            $table->string('kpp')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('address')->nullable();
            $table->json('bank')->nullable();
            $table->json('representative')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('parties');
    }
}