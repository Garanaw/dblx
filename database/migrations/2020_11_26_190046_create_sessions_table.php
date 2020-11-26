<?php declare(strict_types = 1);

use App\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration
{
    public function up(): void
    {
        $this->schema->create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('sessions');
    }
}
