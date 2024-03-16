<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenants')->insert([
            [
                'id' => 1,
                'plan_id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Client',   
                'slug' => 'client', 
                'domain' => 'teste.com',
                'subdomain' => 'client',
                'template' => 'default',
                'status' => true
            ],
            [
                'id' => 2,
                'plan_id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Admin',  
                'slug' => 'admin',  
                'domain' => 'teste.com',
                'subdomain' => 'master',
                'template' => 'default',
                'status' => true
            ]            
        ]);
    }
}
