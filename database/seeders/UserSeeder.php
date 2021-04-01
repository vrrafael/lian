<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'name' => 'Policarpo Quaresma',
                'email' => 'policarpo@loremipsum.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'remember_token' => \Illuminate\Support\Str::random(10),
            ],
            [
                'name' => 'Maria Capitolina',
                'email' => 'capitolina@loremipsum.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password                
            ],
            [
                'name' => 'Pedro Alcantara',
                'email' => 'pedro@loremipsum.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password                
            ],
        ];

        foreach($dados as $user){
            (new User())->fill($user)->save();
        }
    }
}
