<?php

namespace Database\Seeders;

use App\Models\ConnectionStatus;
use Illuminate\Database\Seeder;

class ConnectionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = config('rssh.seeder.connection_status');

        foreach ($names as $key => $value) {
            ConnectionStatus::create([
                'name' => $value
            ]);
        }
    }
}
