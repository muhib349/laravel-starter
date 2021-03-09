<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizations')->truncate();

        DB::table('organizations')->insert([
            [
                'name' => 'DPDC',
                'logo' => 'N/A',
                'address' => 'DPDC, Dhaka, Bangladesh',
                'division' => 'Dhaka',
                'city' => 'Dhaka',
                'country' => 'Bangladesh',
                'description' => 'Dhaka WASA smart electric meter',
                'contact_number' => '1234567',
                'email' =>'ctg@wasa.com',
                'website' => 'http://ctg-wasa.org.bd/',
                'created_by' => 1,
                'modified_by' =>1,
                'created_at' => now(),
            ]
        ]);
    }
}
