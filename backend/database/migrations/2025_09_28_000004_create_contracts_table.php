// contracts migration
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration {
    public function up(): void {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('templates');
            $table->json('parties'); // {landlordId, sublandlordId, tenantId}
            $table->foreignId('property_id')->constrained('properties');
            $table->json('params'); // number, date, amount, currency, penalty, prolongation, extras
            $table->json('artifacts')->nullable(); // pdf_id, tiff_id, log_json_id
            $table->foreignId('preset_id')->constrained('presets');
            $table->enum('status', ['draft', 'processing', 'done', 'error'])->default('draft');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('contracts');
    }
}