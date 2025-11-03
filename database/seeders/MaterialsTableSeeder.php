<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        $materials = ['Cement','Steel','Bricks','Wood','Paint','Tiles','Glass','Plastic Sheets','Pipes','Wires','Nails','Screws','Adhesive','Lubricant','Oil','Sand','Gravel','Concrete','Fabric','Leather','Ink','Paper','Cartridge','Fittings','Panels','Cables','Rods','Beams','Equipment Parts','Chemicals'];

        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'name' => $material,
                'unit' => ['kg','ltr','pcs','meter'][rand(0,3)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
