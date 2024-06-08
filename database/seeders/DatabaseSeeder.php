<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pharmacy;
use App\Models\Role;
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
        Role::create([
            'name' => 'engaged',
        ]);

       User::create([
          'name'=>'engaged',
           'email'=>'engaged@engaged.com',
           'password'=>Hash::make('engaged'),
           'role_id'=>2
       ]);
//
//        // \App\Models\User::factory(10)->create();
//
//        // \App\Models\User::factory()->create([
//        //     'name' => 'Test User',
//        //     'email' => 'test@example.com',
//        $medicaments = [
//            [
//                'name' => 'Paracetamol',
//                'price' => 5.00,
//                'prescreption' => 'Take one tablet every 4-6 hours',
//            ],
//            [
//                'name' => 'Ibuprofen',
//                'price' => 8.50,
//                'prescreption' => 'Take one tablet every 6-8 hours with food',
//            ],
//            [
//                'name' => 'Amoxicillin',
//                'price' => 12.00,
//                'prescreption' => 'Take one capsule every 8 hours for 7 days',
//            ],
//            [
//                'name' => 'Loratadine',
//                'price' => 4.75,
//                'prescreption' => 'Take one tablet daily',
//            ],
//            [
//                'name' => 'Omeprazole',
//                'price' => 15.20,
//                'prescreption' => 'Take one capsule daily before breakfast',
//            ],
//        ];
//
//        DB::table('medicaments')->insert($medicaments);

     // ]);

        // DB::table('table1s')->insert([
        //     [
        //         'name' => 'Sample Name 1',
        //         'att1' => 'Sample Attribute 1-1',
        //         'att2' => 'Sample Attribute 1-2',
        //         'att3' => 'Sample Attribute 1-3',
        //         'att4' => 'Sample Attribute 1-4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Sample Name 2',
        //         'att1' => 'Sample Attribute 2-1',
        //         'att2' => 'Sample Attribute 2-2',
        //         'att3' => 'Sample Attribute 2-3',
        //         'att4' => 'Sample Attribute 2-4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Sample Name 3',
        //         'att1' => 'Sample Attribute 3-1',
        //         'att2' => 'Sample Attribute 3-2',
        //         'att3' => 'Sample Attribute 3-3',
        //         'att4' => 'Sample Attribute 3-4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Sample Name 4',
        //         'att1' => 'Sample Attribute 4-1',
        //         'att2' => 'Sample Attribute 4-2',
        //         'att3' => 'Sample Attribute 4-3',
        //         'att4' => 'Sample Attribute 4-4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Sample Name 5',
        //         'att1' => 'Sample Attribute 5-1',
        //         'att2' => 'Sample Attribute 5-2',
        //         'att3' => 'Sample Attribute 5-3',
        //         'att4' => 'Sample Attribute 5-4',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
//        Pharmacy::factory(15)->create();

    }
}
