<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("article_views", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("article_id")->constrained("articles")->cascadeOnDelete();
            $table->timestamps();

            $table->index(["article_id", "created_at"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("article_views");
    }
};
