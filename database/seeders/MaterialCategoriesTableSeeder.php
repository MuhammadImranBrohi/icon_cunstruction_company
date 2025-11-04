<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            // Level 1 Categories
            ['Cement & Concrete', null, 'Cement, concrete, aggregates and related materials'],
            ['Steel & Metals', null, 'Steel bars, structural steel, metal products'],
            ['Wood & Timber', null, 'Lumber, plywood, timber products'],
            ['Electrical', null, 'Wires, cables, electrical fixtures and components'],
            ['Plumbing', null, 'Pipes, fittings, sanitaryware and plumbing materials'],

            // Level 2 - Under Cement & Concrete
            ['Portland Cement', 1, 'Various types of cement for construction'],
            ['Ready Mix Concrete', 1, 'Pre-mixed concrete for direct use'],
            ['Concrete Blocks', 1, 'Concrete blocks for masonry work'],
            ['Aggregates', 1, 'Sand, gravel, crushed stone for concrete'],
            ['Concrete Admixtures', 1, 'Chemical additives for concrete'],

            // Level 2 - Under Steel & Metals
            ['Reinforcement Bars', 2, 'Steel bars for concrete reinforcement'],
            ['Structural Steel', 2, 'Beams, columns, structural sections'],
            ['Steel Plates', 2, 'Steel plates for various applications'],
            ['Wire Mesh', 2, 'Welded wire mesh for reinforcement'],
            ['Metal Fasteners', 2, 'Bolts, nuts, screws, and connectors'],

            // Level 2 - Under Wood & Timber
            ['Lumber', 3, 'Sawn timber for construction'],
            ['Plywood', 3, 'Plywood sheets for formwork and finishing'],
            ['Particle Board', 3, 'Engineered wood products'],
            ['Laminates', 3, 'Decorative laminates for interiors'],
            ['Timber Products', 3, 'Processed timber and wood products'],

            // Level 2 - Under Electrical
            ['Wires & Cables', 4, 'Electrical wires and power cables'],
            ['Switches & Sockets', 4, 'Electrical switches and power outlets'],
            ['Lighting Fixtures', 4, 'Light fittings and luminaires'],
            ['Distribution Boards', 4, 'Electrical panels and distribution boards'],
            ['Conduits & Trunking', 4, 'Electrical conduits and cable management'],

            // Level 2 - Under Plumbing
            ['PVC Pipes', 5, 'PVC pipes for plumbing systems'],
            ['CPVC Pipes', 5, 'CPVC pipes for hot water systems'],
            ['GI Pipes', 5, 'Galvanized iron pipes for plumbing'],
            ['Sanitaryware', 5, 'Toilets, sinks, bathroom fixtures'],
            ['Fittings & Valves', 5, 'Pipe fittings and control valves'],

            // Additional categories
            ['Paints & Coatings', null, 'Paints, varnishes, and protective coatings'],
            ['Tiles & Stone', null, 'Ceramic tiles, marble, granite'],
            ['Glass & Aluminum', null, 'Glass panels and aluminum sections'],
            ['Insulation Materials', null, 'Thermal and acoustic insulation'],
            ['Hardware & Tools', null, 'Construction hardware and tools'],
        ];

        foreach ($categories as $category) {
            DB::table('material_categories')->insert([
                'name' => $category[0],
                'parent_id' => $category[1],
                'description' => $category[2],
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
