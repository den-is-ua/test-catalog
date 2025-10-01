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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('categories')  
                ->nullOnDelete()        
                ->cascadeOnUpdate();

            $table->string('name', 50);
            $table->timestamps();

            $table->unique(['parent_id', 'name']);
        });

        DB::statement("
            ALTER TABLE categories
            ADD CONSTRAINT categories_parent_not_self
            CHECK (parent_id IS NULL OR parent_id <> id)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
