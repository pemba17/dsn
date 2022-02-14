<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;
use App\Models\TeamInvitation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            0=>[
                'name'=>'Admin',
                'email'=>'superadmin@dsn.com',
                'password'=>Hash::make('admin123'),
                'role'=>'superadmin'
            ],
            1=>[
                'name'=>'Vendor',
                'email'=>'demovendor@dsn.com',
                'password'=>Hash::make('vendor123'),
                'role'=>'vendor'
            ],
            2=>[
                'name'=>'seller',
                'email'=>'seller@dsn.com',
                'password'=>Hash::make('seller123'),
                'role'=>'seller'
            ]
        ];

        foreach($data as $row){
            $user=User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
                'role' => $row['role']
            ]);
    
            $team = Team::create([
                'user_id'=>$user->id  ,
                'name' => $user->name.'Team',
                'personal_team' => 1
            ]);
        }
    }
}
