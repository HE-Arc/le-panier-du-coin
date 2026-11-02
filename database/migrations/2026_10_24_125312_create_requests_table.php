<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("requests", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("requester_id")->constrained("users")->cascadeOnDelete();
            $table->foreignUuid("category_id")->constrained("categories")->restrictOnDelete();
            $table->string("title");
            $table->text("description");
            $table->string("location");
            $table->decimal("budget", 8, 2);
            $table->enum("status", ["open", "in_progress", "fulfilled"])->default("open");
            $table->date("target_date");
            $table->timestamp("published_at")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("requests");
    }
};