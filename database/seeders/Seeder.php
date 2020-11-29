<?php declare(strict_types = 1);

namespace Database\Seeders;

use Illuminate\Database\Seeder as BaseSeeder;

abstract class Seeder extends BaseSeeder
{
    public abstract function run(): void;
}
