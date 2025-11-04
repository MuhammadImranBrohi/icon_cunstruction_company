<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentTableSeeder extends Seeder
{
    public function run()
    {
        $equipment = [
            // Earth Moving Equipment
            ['Caterpillar Excavator 320D', 'EQP-EXC-001', 1, 'CAT 320D', 'CAT320D001', '2022-03-15', 8500000, 6800000, 15.00, 'excellent', 'Main Yard', 'available', 'Heavy duty excavator for earth work'],
            ['Komatsu Bulldozer D65', 'EQP-BUL-001', 1, 'D65', 'KOMD65001', '2021-08-20', 12000000, 9600000, 12.00, 'good', 'Site A', 'in_use', 'Large bulldozer for grading'],
            ['JCB Backhoe Loader', 'EQP-BAC-001', 1, '3DX', 'JCB3DX001', '2023-01-10', 4500000, 4275000, 10.00, 'excellent', 'Main Yard', 'available', 'Multi-purpose backhoe loader'],

            // Concrete Equipment - STATUS CHANGE: 'under_maintenance' → 'maintenance'
            ['Concrete Mixer 10/7', 'EQP-MIX-001', 2, '10/7', 'MIX10001', '2022-11-05', 850000, 765000, 8.00, 'good', 'Site B', 'in_use', 'Concrete mixer 10/7 capacity'],
            ['Concrete Pump 40m', 'EQP-PMP-001', 2, '40m', 'PMP40001', '2021-12-15', 3500000, 2800000, 12.00, 'fair', 'Main Yard', 'maintenance', 'Concrete pump with 40m reach'], // CHANGED
            ['Concrete Vibrator', 'EQP-VIB-001', 2, 'Electric', 'VIB10001', '2023-03-20', 45000, 42750, 5.00, 'excellent', 'Site C', 'available', 'Electric concrete vibrator'],

            // Lifting Equipment
            ['Tower Crane 200tm', 'EQP-CRN-001', 3, '200tm', 'CRN20001', '2020-06-10', 15000000, 12000000, 10.00, 'good', 'Site A', 'in_use', '200 ton-meter tower crane'],
            ['Mobile Crane 50T', 'EQP-CRN-002', 3, '50T', 'CRN50001', '2021-09-15', 8500000, 6800000, 12.00, 'excellent', 'Main Yard', 'available', '50 ton mobile crane'],
            ['Chain Hoist 5T', 'EQP-HOI-001', 3, '5T', 'HOI5001', '2023-02-28', 85000, 80750, 3.00, 'good', 'Warehouse', 'available', '5 ton chain hoist'],

            // Transportation Equipment
            ['Dump Truck 10T', 'EQP-TRK-001', 4, '10T', 'TRK10001', '2022-05-20', 2500000, 2125000, 15.00, 'good', 'Site B', 'in_use', '10 ton dump truck'],
            ['Pickup Truck', 'EQP-TRK-002', 4, 'Hilux', 'TRK20001', '2023-01-15', 3500000, 3325000, 10.00, 'excellent', 'Main Office', 'available', 'Staff pickup truck'],
            ['Trailer 20T', 'EQP-TRL-001', 4, '20T', 'TRL20001', '2021-11-10', 1200000, 960000, 8.00, 'fair', 'Main Yard', 'available', '20 ton equipment trailer'],

            // Additional equipment - STATUS UPDATES
            ['Compactor Plate', 'EQP-COM-001', 6, 'Vibratory', 'COM10001', '2023-04-05', 280000, 266000, 6.00, 'excellent', 'Site C', 'available', 'Vibratory plate compactor'],
            ['Road Roller 8T', 'EQP-ROL-001', 6, '8T', 'ROL8001', '2022-08-15', 2800000, 2380000, 10.00, 'good', 'Site A', 'in_use', '8 ton road roller'],
            ['Pile Driver', 'EQP-PIL-001', 7, 'Hydraulic', 'PIL10001', '2021-07-20', 8500000, 6800000, 12.00, 'fair', 'Main Yard', 'maintenance', 'Hydraulic pile driver'], // CHANGED
            ['Drilling Machine', 'EQP-DRI-001', 13, 'Rotary', 'DRI10001', '2023-02-10', 450000, 427500, 8.00, 'excellent', 'Site B', 'available', 'Rotary drilling machine'],
            ['Jack Hammer', 'EQP-BRK-001', 14, 'Pneumatic', 'BRK10001', '2023-03-15', 85000, 80750, 5.00, 'good', 'Site C', 'in_use', 'Pneumatic jack hammer'],
            ['Cutting Machine', 'EQP-CUT-001', 15, 'Concrete', 'CUT10001', '2022-12-20', 280000, 266000, 6.00, 'excellent', 'Main Yard', 'available', 'Concrete cutting machine'],
            ['Welding Machine', 'EQP-WEL-001', 16, 'Arc', 'WEL10001', '2023-01-25', 45000, 42750, 4.00, 'good', 'Workshop', 'available', 'Arc welding machine'],
            ['Power Generator 100KVA', 'EQP-PWR-001', 17, '100KVA', 'PWR10001', '2022-10-15', 1200000, 1080000, 10.00, 'excellent', 'Site A', 'in_use', '100KVA power generator'],
            ['Air Compressor', 'EQP-COM-002', 17, '200CFM', 'COM20001', '2023-03-10', 850000, 807500, 8.00, 'good', 'Site B', 'available', '200CFM air compressor'],
            ['Measuring Instruments Set', 'EQP-MEA-001', 20, 'Digital', 'MEA10001', '2023-04-01', 150000, 142500, 3.00, 'excellent', 'Survey Dept', 'available', 'Digital measuring instruments'],
            ['Scaffolding System', 'EQP-SCA-001', 22, 'Cuplock', 'SCA10001', '2022-09-15', 850000, 765000, 5.00, 'good', 'Site C', 'in_use', 'Cuplock scaffolding system'],
            ['Formwork Panels', 'EQP-FRM-001', 23, 'Steel', 'FRM10001', '2023-02-20', 1200000, 1140000, 6.00, 'excellent', 'Main Yard', 'available', 'Steel formwork panels'],
            ['Trencher Machine', 'EQP-TRN-001', 25, 'Chain', 'TRN10001', '2022-11-10', 2800000, 2520000, 10.00, 'good', 'Site A', 'available', 'Chain type trencher machine'],
            ['Grader Motor', 'EQP-GRA-001', 26, 'Auto', 'GRA10001', '2021-12-20', 4500000, 3600000, 12.00, 'fair', 'Main Yard', 'maintenance', 'Motor grader for road work'], // CHANGED
            ['Paver Machine', 'EQP-PAV-001', 27, 'Asphalt', 'PAV10001', '2022-07-15', 8500000, 7225000, 15.00, 'good', 'Site B', 'in_use', 'Asphalt paving machine'],
            ['Dredging Equipment', 'EQP-DRE-001', 28, 'Cutter', 'DRE10001', '2021-10-10', 15000000, 12000000, 12.00, 'poor', 'Storage', 'retired', 'Cutter suction dredger'],
            ['Tunnel Boring Machine', 'EQP-TUN-001', 29, 'Small', 'TUN10001', '2020-08-20', 50000000, 40000000, 8.00, 'fair', 'Storage', 'retired', 'Small tunnel boring machine'],
            ['Forklift 5T', 'EQP-FOR-001', 33, '5T', 'FOR5001', '2023-01-30', 1200000, 1140000, 10.00, 'excellent', 'Warehouse', 'available', '5 ton forklift for material handling'],
            ['Warehouse Racking', 'EQP-RAC-001', 34, 'Heavy Duty', 'RAC10001', '2022-12-05', 850000, 807500, 4.00, 'good', 'Warehouse', 'available', 'Heavy duty warehouse racking'],
            ['Water Pump 3HP', 'EQP-WAT-001', 35, '3HP', 'WAT3001', '2023-03-25', 45000, 42750, 5.00, 'excellent', 'Site C', 'available', '3HP water pump for dewatering'],
            ['Dehumidifier', 'EQP-DEH-001', 35, 'Industrial', 'DEH10001', '2023-02-15', 85000, 80750, 4.00, 'good', 'Storage', 'available', 'Industrial dehumidifier'],
            ['Safety Equipment Set', 'EQP-SAF-001', 19, 'Basic', 'SAF10001', '2023-04-10', 150000, 142500, 2.00, 'excellent', 'Safety Dept', 'available', 'Basic safety equipment set'],
            ['Fire Extinguishers', 'EQP-FIR-001', 19, 'CO2', 'FIR10001', '2023-03-05', 45000, 42750, 3.00, 'good', 'All Sites', 'available', 'CO2 fire extinguishers'],
        ];

        foreach ($equipment as $item) {
            DB::table('equipment')->insert([
                'name' => $item[0],
                'code' => $item[1],
                'equipment_category_id' => $item[2],
                'model' => $item[3],
                'serial_number' => $item[4],
                'purchase_date' => $item[5],
                'price' => $item[6],
                'current_value' => $item[7],
                'depreciation_rate' => $item[8],
                'condition_status' => $item[9],
                'location' => $item[10],
                'status' => $item[11], // Now using valid enum values
                'notes' => $item[12],
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}