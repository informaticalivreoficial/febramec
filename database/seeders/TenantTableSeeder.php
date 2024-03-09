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
                'plan_id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Client',    
                'domain' => 'teste.com',
                'subdomain' => 'client',
                'template' => 'default',
                'status' => true
            ],
            [
                'plan_id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Admin',    
                'domain' => 'teste.com',
                'subdomain' => 'master',
                'template' => 'default',
                'status' => true
            ]            
        ]);
    }
}
