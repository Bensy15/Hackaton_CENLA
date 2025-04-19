<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::create([
            'name' => 'Red Cross',
            'code' => 'RC1234',
        ]);

        Organization::create([
            'name' => 'Green Peace',
            'code' => 'GP5678',
        ]);

        Organization::create([
            'name' => 'Doctors Without Borders',
            'code' => 'DWB9012',
        ]);
    }
}