<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetSeeder extends Seeder
{
    public function run()
    {

        DB::table('expense_types')->insert([
            ['name' => 'CCF', 'description' => 'Fixed Charge Contract'],
            ['name' => 'CCV', 'description' => 'Variable Charge Contract'],
            ['name' => 'Bon Command', 'description' => 'Purchase Order for materials or services'],
            ['name' => 'Investment', 'description' => 'Investment expenses for infrastructure or projects'],
            ['name' => 'Functionality', 'description' => 'Operational expenses like utilities, salaries, etc.']
        ]);

        // Insert data into 'lignes_budgetaire' table
        DB::table('ligne_budgetaires')->insert([
            ['name' => 'Electricity', 'description' => 'Electricity bills for operations', 'expense_type' => 'Electricity', 'annual_budget' => 50000, 'spent_amount' => 35000, 'year' => 2025],
            ['name' => 'Water', 'description' => 'Water consumption for operations', 'expense_type' => 'Water', 'annual_budget' => 20000, 'spent_amount' => 12000, 'year' => 2025],
            ['name' => 'Materials', 'description' => 'Investment in new materials and supplies', 'expense_type' => 'Investment', 'annual_budget' => 70000, 'spent_amount' => 50000, 'year' => 2025],
            ['name' => 'Salaries', 'description' => 'Salaries for all employees', 'expense_type' => 'Salaries', 'annual_budget' => 100000, 'spent_amount' => 80000, 'year' => 2025],
            ['name' => 'Maintenance', 'description' => 'Maintenance costs for facilities', 'expense_type' => 'Maintenance', 'annual_budget' => 15000, 'spent_amount' => 10000, 'year' => 2025]
        ]);

        // Insert data into 'dep_marche' table
        DB::table('dep_marches')->insert([
            [
                'ligne_budgetaire_id' => 1,
                'expense_type' => 'CCF',
                'reference' => 'EXP001',
                'amount' => 5000,
                'expense_date' => '2025-01-10',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'payment_method' => 'Bank Transfer',
                'approval_date' => '2025-01-05',
                'status' => 'approved',
                'details' => 'Electricity payment for January 2025.'
            ],
            [
                'ligne_budgetaire_id' => 2,
                'expense_type' => 'CCV',
                'reference' => 'EXP002',
                'amount' => 3000,
                'expense_date' => '2025-01-15',
                'start_date' => '2025-01-01',
                'end_date' => '2025-03-31',
                'payment_method' => 'Cash',
                'approval_date' => '2025-01-12',
                'status' => 'approved',
                'details' => 'Water consumption for Q1 2025.'
            ],
            [
                'ligne_budgetaire_id' => 3,
                'expense_type' => 'Bon de Commande',
                'reference' => 'EXP003',
                'amount' => 15000,
                'expense_date' => '2025-02-10',
                'start_date' => null,
                'end_date' => null,
                'payment_method' => 'Bank Transfer',
                'approval_date' => '2025-02-05',
                'status' => 'approved',
                'details' => 'Purchase of materials for project X.'
            ],
            [
                'ligne_budgetaire_id' => 4,
                'expense_type' => 'CCF',
                'reference' => 'EXP004',
                'amount' => 10000,
                'expense_date' => '2025-01-20',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'payment_method' => 'Bank Transfer',
                'approval_date' => '2025-01-18',
                'status' => 'pending',
                'details' => 'Salary payment for January 2025.'
            ],
            [
                'ligne_budgetaire_id' => 5,
                'expense_type' => 'CCV',
                'reference' => 'EXP005',
                'amount' => 8000,
                'expense_date' => '2025-02-05',
                'start_date' => '2025-01-01',
                'end_date' => '2025-06-30',
                'payment_method' => 'Cash',
                'approval_date' => '2025-01-25',
                'status' => 'rejected',
                'details' => 'Maintenance work for building (rejected).'
            ]
        ]);


        // Insert data into 'expense_types' table

    }
}
