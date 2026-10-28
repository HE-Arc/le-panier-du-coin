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
        Schema::create("articles", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("title");
            $table->text("description");
            $table->string("location");
            $table->decimal("price", 8, 2);
            $table->string("brand");
            $table->string("availability");
            $table->unsignedInteger("views")->default(0);
            $table->enum("condition", ["new", "like_new", "good", "fair", "not_working"]);
            $table
                ->enum("status", ["available", "reserved", "sold", "draft"])
                ->default("draft");
            $table->boolean("negotiable")->default(true);
            $table->foreignUuid("seller_id")->constrained("users")->cascadeOnDelete();
            $table->foreignUuid("category_id")->constrained("categories")->cascadeOnDelete();
            $table->timestamp("published_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("articles");
    }
};
