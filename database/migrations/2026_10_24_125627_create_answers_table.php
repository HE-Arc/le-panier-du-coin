<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("answers", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("request_id")->constrained()->cascadeOnDelete();
            $table->foreignUuid("proposer_id")->constrained("users")->cascadeOnDelete();
            $table->foreignUuid("proposed_article_id")->nullable()->constrained("articles")->nullOnDelete();
            $table->text("comment")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("answers");
    }
};