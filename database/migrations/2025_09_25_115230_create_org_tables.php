<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $t) {
            $t->id();
            $t->string('name')->unique();
            $t->timestamps();
        });

        Schema::create('positions', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->foreignId('department_id')->constrained()->cascadeOnDelete();
            $t->timestamps();
            $t->unique(['name','department_id']);
        });

        Schema::create('employees', function (Blueprint $t) {
            $t->id();
            $t->string('code')->unique()->index();
            $t->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $t->string('first_name');
            $t->string('last_name');
            $t->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $t->foreignId('position_id')->nullable()->constrained()->nullOnDelete();
            $t->string('email')->nullable()->index();
            $t->string('phone')->nullable();
            $t->date('started_at')->nullable();
            $t->json('meta')->nullable();
            $t->timestamps();
            $t->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('departments');
    }
};
