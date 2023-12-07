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

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->integer('recordIndex');
            $table->foreignId('pasienId')->constrained('user');
            $table->foreignId('dokterId')->constrained('user');
            $table->foreignId('medicineId')->constrained('medicine');
            $table->integer('kuantitas');
            $table->longText('tindakan');
            $table->timestamp('tglBerobat');
            $table->enum('status', ["delayed","confirmed"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
