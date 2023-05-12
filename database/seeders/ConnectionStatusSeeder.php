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
        $names = ['connected', 'terminated', 'request terminate', 'not connected'];

        foreach ($names as $value) {
            ConnectionStatus::create([
                'name' => $value,
            ]);
        }
    }
}
