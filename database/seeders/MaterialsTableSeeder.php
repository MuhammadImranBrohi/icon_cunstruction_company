<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            // Cement & Concrete
            ['Portland Cement (OPC 43 Grade)', 'MAT-CEM-001', 'Ordinary Portland Cement 43 Grade for general construction', 1, 1, 850.00, 1, 1000, 100, 2000, 150],
            ['Ready Mix Concrete M20', 'MAT-CON-001', 'Ready mix concrete grade M20 for structural work', 1, 11, 6500.00, 2, 50, 10, 100, 20],
            ['Coarse Aggregate 20mm', 'MAT-AGG-001', '20mm coarse aggregate for concrete mixing', 1, 1, 1200.00, 3, 500, 100, 1000, 200],
            ['Fine Aggregate (River Sand)', 'MAT-AGG-002', 'Fine river sand for plastering and masonry', 1, 11, 1800.00, 4, 300, 50, 600, 100],

            // Steel & Metals
            ['Steel Rebar TMT 500D', 'MAT-STL-001', 'Thermo-Mechanically Treated steel bars grade 500D', 2, 1, 185000.00, 5, 50, 10, 100, 20],
            ['Structural Steel ISMB 150', 'MAT-STL-002', 'Indian Standard Medium Weight Beam 150mm', 2, 1, 95000.00, 6, 20, 5, 50, 10],
            ['Steel Plate 10mm', 'MAT-STL-003', 'Mild steel plate 10mm thickness', 2, 1, 110000.00, 7, 15, 3, 30, 5],
            ['Welded Wire Mesh', 'MAT-STL-004', 'Welded wire mesh for reinforcement', 2, 17, 85.00, 8, 200, 50, 400, 100],

            // Wood & Timber
            ['Deodar Wood 2x4', 'MAT-WOD-001', 'Deodar wood planks 2x4 inches', 3, 5, 450.00, 9, 1000, 200, 2000, 300],
            ['Marine Plywood 18mm', 'MAT-WOD-002', '18mm marine grade plywood for formwork', 3, 17, 2800.00, 10, 50, 10, 100, 20],
            ['Particle Board 18mm', 'MAT-WOD-003', '18mm particle board for interior work', 3, 17, 1200.00, 11, 30, 5, 60, 10],

            // Electrical
            ['PVC Insulated Cable 2.5mm', 'MAT-ELC-001', '2.5mm² PVC insulated copper cable', 4, 5, 85.00, 12, 5000, 1000, 10000, 2000],
            ['Electrical Conduit Pipe 20mm', 'MAT-ELC-002', '20mm PVC electrical conduit pipe', 4, 5, 45.00, 13, 1000, 200, 2000, 300],
            ['MCB 16A Single Pole', 'MAT-ELC-003', '16 Ampere Miniature Circuit Breaker single pole', 4, 17, 350.00, 14, 100, 20, 200, 40],

            // Plumbing
            ['PVC Pipe 4 inch', 'MAT-PLM-001', '4 inch PVC pipe for drainage', 5, 5, 1200.00, 15, 200, 50, 400, 100],
            ['CPVC Pipe 1 inch', 'MAT-PLM-002', '1 inch CPVC pipe for hot water', 5, 5, 180.00, 16, 300, 100, 600, 150],
            ['Water Tap Chrome', 'MAT-PLM-003', 'Chrome plated water tap', 5, 17, 850.00, 17, 50, 10, 100, 20],

            // Paints & Coatings
            ['Weather Shield Paint White', 'MAT-PNT-001', 'Exterior weather shield paint white color', 26, 21, 2800.00, 18, 100, 20, 200, 40],
            ['Primer Coat', 'MAT-PNT-002', 'Metal and wood primer coat', 26, 21, 1200.00, 19, 80, 15, 160, 30],

            // Tiles & Stone
            ['Ceramic Floor Tile 2x2', 'MAT-TIL-001', '2x2 feet ceramic floor tiles', 27, 10, 180.00, 20, 5000, 1000, 10000, 2000],
            ['Marble Slab White', 'MAT-TIL-002', 'White marble slabs for flooring', 27, 17, 4500.00, 21, 100, 20, 200, 40],

            // Additional materials to reach 35+
            ['Waterproofing Chemical', 'MAT-CHE-001', 'Liquid waterproofing chemical', 30, 21, 2800.00, 22, 50, 10, 100, 20],
            ['Wall Putty', 'MAT-CHE-002', 'White cement based wall putty', 30, 21, 650.00, 23, 200, 50, 400, 100],
            ['Construction Adhesive', 'MAT-CHE-003', 'Multi-purpose construction adhesive', 30, 21, 450.00, 24, 100, 20, 200, 40],
            ['Safety Helmet', 'MAT-SAF-001', 'Industrial safety helmet', 31, 17, 350.00, 25, 100, 20, 200, 40],
            ['Safety Shoes', 'MAT-SAF-002', 'Industrial safety shoes', 31, 17, 2500.00, 26, 50, 10, 100, 20],
            ['Measuring Tape 5m', 'MAT-TOO-001', '5 meter steel measuring tape', 31, 17, 450.00, 27, 100, 20, 200, 40],
            ['Spirit Level', 'MAT-TOO-002', 'Aluminum spirit level', 31, 17, 850.00, 28, 50, 10, 100, 20],
            ['Glass Wool Insulation', 'MAT-INS-001', 'Glass wool thermal insulation', 29, 17, 1800.00, 29, 30, 5, 60, 10],
            ['Aluminum Section', 'MAT-GLA-001', 'Aluminum section for glazing', 28, 5, 650.00, 30, 200, 50, 400, 100],
            ['Float Glass 6mm', 'MAT-GLA-002', '6mm clear float glass', 28, 17, 450.00, 31, 100, 20, 200, 40],
            ['Roofing Sheet', 'MAT-ROF-001', 'Galvanized roofing sheet', 32, 17, 1200.00, 32, 50, 10, 100, 20],
            ['Nails Assorted', 'MAT-HAR-001', 'Assorted nails for construction', 31, 1, 120.00, 33, 1000, 200, 2000, 300],
            ['Screws Assorted', 'MAT-HAR-002', 'Assorted screws for wood and metal', 31, 1, 85.00, 34, 2000, 500, 4000, 800],
            ['Hinges Brass', 'MAT-HAR-003', 'Brass hinges for doors', 31, 17, 280.00, 35, 100, 20, 200, 40],
        ];

        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'name' => $material[0],
                'code' => $material[1],
                'description' => $material[2],
                'material_category_id' => $material[3],
                'unit_of_measure_id' => $material[4],
                'unit_price' => $material[5],
                'supplier_id' => $material[6],
                'current_stock' => $material[7],
                'min_stock_level' => $material[8],
                'max_stock_level' => $material[9],
                'reorder_level' => $material[10],
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
