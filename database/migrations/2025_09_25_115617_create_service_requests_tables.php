<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $t) {
            $t->id();
            $t->string('code')->unique()->index();
            $t->string('title');
            $t->string('type')->index();              // email/vpn/software/...
            $t->text('description')->nullable();
            $t->enum('status', [
                'draft','pending_approval','approved','rejected',
                'in_progress','done','closed'
            ])->default('draft')->index();
            $t->foreignId('requester_id')->constrained('users')->cascadeOnDelete();
            $t->timestamps();
            $t->softDeletes();
        });

        Schema::create('service_request_approvals', function (Blueprint $t) {
            $t->id();
            $t->foreignId('service_request_id')->constrained()->cascadeOnDelete();
            $t->foreignId('approver_id')->constrained('users')->cascadeOnDelete();
            $t->unsignedInteger('step')->default(1)->index();
            $t->enum('status', ['pending','approved','rejected'])->default('pending')->index();
            $t->timestamp('decided_at')->nullable();
            $t->text('remarks')->nullable();
            $t->timestamps();

            // <-- ชื่อ index สั้นกว่าค่าจำกัดของ MySQL
            $t->unique(['service_request_id','step','approver_id'], 'srreq_app_req_step_app_uq');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_request_approvals');
        Schema::dropIfExists('service_requests');
    }
};
