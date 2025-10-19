<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // Orientation Essentials
            [
                'name' => 'Official Training Book',
                'description' => 'A mandatory handbook for all new students covering campus rules and orientation schedules.',
                'price' => 75000,
            ],
            [
                'name' => 'Plain White Shirt',
                'description' => 'A formal, long-sleeved white shirt required for official campus ceremonies. Made from comfortable cotton.',
                'price' => 120000,
            ],
            [
                'name' => 'Formal Black Trousers',
                'description' => 'Standard issue black fabric trousers for formal events. Breathable and durable material.',
                'price' => 150000,
            ],
            [
                'name' => 'Official Campus Belt',
                'description' => 'A black leather belt with the official university logo on the buckle.',
                'price' => 60000,
            ],
            [
                'name' => 'University Tie',
                'description' => 'The official university tie, required for all formal student assemblies.',
                'price' => 55000,
            ],
            [
                'name' => 'Red Ribbon for Nametag',
                'description' => 'A one-meter red ribbon for creating student nametags during orientation week.',
                'price' => 5000,
            ],
            [
                'name' => 'A3 Poster Paper',
                'description' => 'A pack of 5 high-quality A3 sheets for creating posters and group projects.',
                'price' => 12000,
            ],
            // Academic Books
            [
                'name' => 'Calculus I Textbook',
                'description' => 'The official, required textbook for the first semester Calculus I course.',
                'price' => 250000,
            ],
            [
                'name' => 'Calculus II Textbook',
                'description' => 'The official, required textbook for the second semester Calculus II course.',
                'price' => 265000,
            ],
            [
                'name' => 'Physics: Mechanics Textbook',
                'description' => 'The fundamental textbook for the introductory course on classical mechanics.',
                'price' => 280000,
            ],
        ]);
    }
}
