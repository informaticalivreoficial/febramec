<?php
namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        DB::table('users')->insert([            
            [
                'id' => 2,
                'tenant' => $tenant->id,
                'name' => 'Horácio Nunes Adm',
                'email' => 'teste@teste.com.br',
                'email_verified_at' => now(),
                'password' => bcrypt('123456'),
                'code' => '123456',
                'remember_token' => \Illuminate\Support\Str::random(10),                
                'created_at' => now(),              
                'superadmin' => true,
                'status' => true
            ],
            [
                'id' => 1,
                'tenant' => 2,
                'name' => env('ADMIN_NOME'),
                'email' => env('ADMIN_EMAIL'),
                'email_verified_at' => now(),
                'password' => bcrypt(env('ADMIN_PASS')),
                'code' => env('ADMIN_PASS'),
                'remember_token' => \Illuminate\Support\Str::random(10),                
                'created_at' => now(),                
                'superadmin' => true,
                'status' => true
            ],            
        ]);

        User::factory()->count(20)->create();
    }
}
