<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOfMeasuresTableSeeder extends Seeder
{
    public function run()
    {
        $units = [
            ['Kilogram', 'kg', 'Weight measurement in kilograms'],
            ['Gram', 'g', 'Weight measurement in grams'],
            ['Metric Ton', 'MT', 'Weight measurement in metric tons'],
            ['Pound', 'lb', 'Weight measurement in pounds'],
            ['Meter', 'm', 'Length measurement in meters'],
            ['Centimeter', 'cm', 'Length measurement in centimeters'],
            ['Millimeter', 'mm', 'Length measurement in millimeters'],
            ['Foot', 'ft', 'Length measurement in feet'],
            ['Inch', 'in', 'Length measurement in inches'],
            ['Square Meter', 'm²', 'Area measurement in square meters'],
            ['Square Foot', 'ft²', 'Area measurement in square feet'],
            ['Cubic Meter', 'm³', 'Volume measurement in cubic meters'],
            ['Cubic Foot', 'ft³', 'Volume measurement in cubic feet'],
            ['Liter', 'L', 'Volume measurement in liters'],
            ['Milliliter', 'ml', 'Volume measurement in milliliters'],
            ['Gallon', 'gal', 'Volume measurement in gallons'],
            ['Piece', 'pcs', 'Count measurement in pieces'],
            ['Dozen', 'doz', 'Count measurement in dozens'],
            ['Set', 'set', 'Measurement in sets'],
            ['Pack', 'pack', 'Measurement in packs'],
            ['Box', 'box', 'Measurement in boxes'],
            ['Roll', 'roll', 'Measurement in rolls'],
            ['Bundle', 'bundle', 'Measurement in bundles'],
            ['Bag', 'bag', 'Measurement in bags'],
            ['Drum', 'drum', 'Measurement in drums'],
            ['Pallet', 'pallet', 'Measurement in pallets'],
            ['Container', 'container', 'Measurement in containers'],
            ['Hour', 'hr', 'Time measurement in hours'],
            ['Day', 'day', 'Time measurement in days'],
            ['Week', 'week', 'Time measurement in weeks'],
            ['Month', 'month', 'Time measurement in months'],
            ['Year', 'year', 'Time measurement in years'],
            ['Unit', 'unit', 'Generic unit measurement'],
            ['Pair', 'pair', 'Measurement in pairs'],
            ['Sheet', 'sheet', 'Measurement in sheets'],
        ];

        foreach ($units as $unit) {
            DB::table('unit_of_measures')->insert([
                'name' => $unit[0],
                'symbol' => $unit[1],
                'description' => $unit[2],
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}