<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name' => 'fatimazahra',
                'last_name' => 'bamhaouch',
                'username' => 'admin_fatimazahra',
                'email' => 'fatimazahra.bamhaouch@etu.uae.ac.ma',
                'password' => bcrypt('123456'),
                'phone_number' => '+21206060606',
                'email_verified_at' => now(),
                'user_type' => 'admin',
                'status' => 'active',
            ],
            [
                'first_name' => 'Salma',
                'last_name' => 'benaouda',
                'username' => 'admin_Salma',
                'email' => 'Salma.benaouda@etu.uae.ac.ma',
                'password' => bcrypt('123456'),
                'phone_number' => '+21206060606',
                'email_verified_at' => now(),
                'user_type' => 'admin',
            ],
            [
                'first_name' => 'fatimazohra',
                'last_name' => 'berradi1',
                'username' => 'admin_fatimazohra',
                'email' => 'fatimazohra.berradi1@etu.uae.ac.ma',
                'password' => bcrypt('123456'),
                'phone_number' => '+21206060606',
                'email_verified_at' => now(),
                'user_type' => 'admin',
            ],
            [
                'first_name' => 'najwa',
                'last_name' => 'abouchama',
                'username' => 'admin_najwa',
                'email' => 'najwa.abouchama@etu.uae.ac.ma',
                'password' => bcrypt('123456'),
                'phone_number' => '+21206060606',
                'email_verified_at' => now(),
                'user_type' => 'admin',
            ],
            [
                'first_name' => 'hind',
                'last_name' => 'lhamid',
                'username' => 'admin_hind',
                'email' => 'hind.lhamid@etu.uae.ac.ma',
                'password' => bcrypt('123456'),
                'phone_number' => '+21206060606',
                'email_verified_at' => now(),
                'user_type' => 'admin',
            ],
        ];
        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole($value['user_type']);
        }
    }
}
