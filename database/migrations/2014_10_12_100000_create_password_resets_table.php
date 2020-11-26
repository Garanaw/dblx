<?php declare(strict_types = 1);

use App\Support\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordResetsTable extends Migration
{
    public function up(): void
    {
        $this->schema->create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('password_resets');
    }
}
