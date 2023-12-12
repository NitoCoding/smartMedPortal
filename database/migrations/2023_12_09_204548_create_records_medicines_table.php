<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('records_medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recordIndex')->constrained('records');
            $table->foreignId('medicineId')->nullable()->constrained('medicines');
            $table->integer('kuantitas')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records_medicines');
    }
};
