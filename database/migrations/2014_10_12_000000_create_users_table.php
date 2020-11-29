<?php declare(strict_types = 1);

use App\Support\Database\Migration;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;

class CreateUsersTable extends Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->seeders = new Collection([
            UserSeeder::class
        ]);
    }

    public function up(): void
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        $this->schema->dropIfExists('users');
    }
}
