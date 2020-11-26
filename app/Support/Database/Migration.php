<?php declare(strict_types = 1);

namespace App\Support\Database;

use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Database\Schema\Builder;

abstract class Migration extends BaseMigration
{
    protected Connection $db;
    protected Builder $schema;

    public function __construct()
    {
        $manager = app(DatabaseManager::class);
        $this->db = $manager->connection();
        $this->schema = $manager->getSchemaBuilder();
    }

    public abstract function up(): void;

    public abstract function down(): void;
}
