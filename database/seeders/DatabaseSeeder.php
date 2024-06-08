<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        User::create([
//           'name'=>'admin',
//            'email'=>'admin@admin.com',
//            'password'=>Hash::make('admin'),
//            'role_id'=>1
//        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $medicaments = [
            [
                'name' => 'Paracetamol',
                'price' => 5.00,
                'prescreption' => 'Take one tablet every 4-6 hours',
            ],
            [
                'name' => 'Ibuprofen',
                'price' => 8.50,
                'prescreption' => 'Take one tablet every 6-8 hours with food',
            ],
            [
                'name' => 'Amoxicillin',
                'price' => 12.00,
                'prescreption' => 'Take one capsule every 8 hours for 7 days',
            ],
            [
                'name' => 'Loratadine',
                'price' => 4.75,
                'prescreption' => 'Take one tablet daily',
            ],
            [
                'name' => 'Omeprazole',
                'price' => 15.20,
                'prescreption' => 'Take one capsule daily before breakfast',
            ],
        ];

        DB::table('medicaments')->insert($medicaments);


    }
}
