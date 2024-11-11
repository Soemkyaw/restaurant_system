<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            ["Rose 001", 4],
            ["Rose 002", 4],
            ["Rose 003", 4],
            ["Rose 004", 4],
            ["Rose 005", 8],
            ["Rose 006", 8],
            ["Rose 007", 2],
            ["Rose 008", 2],
        ];
        foreach ($tables as $table) {
            Table::create([
                'name' => $table[0],
                'seat' => $table[1]
            ]);
        }
    }
}
