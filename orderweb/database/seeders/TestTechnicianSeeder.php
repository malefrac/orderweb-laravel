<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technician = new Technician();
        $technician->document = 989898;
        $technician->name = 'Arnulfo Archundia';
        $technician->especiality = 'Medición de redes';
        $technician->phone = '315312';
        $technician->save();
    }
}
