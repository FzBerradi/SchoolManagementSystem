<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReclamationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all user IDs from the 'users' table
        $userIds = User::pluck('id')->all();

        // Seed data for the reclamations table with dynamic user IDs
        Reclamation::create([
            'user_id' => $this->getRandomUserId($userIds),
            'object' => 'Object A',
            'subject' => 'Subject A',
            'file' => 'img1.img',
        ]);

        Reclamation::create([
            'user_id' => $this->getRandomUserId($userIds),
            'object' => 'Object B',
            'subject' => 'Subject B',
            'file' => 'img2.img',
        ]);

        Reclamation::create([
            'user_id' => $this->getRandomUserId($userIds),
            'object' => 'Object C',
            'subject' => 'Subject C',
            'file' => 'img3.img',
        ]);

        // Add more seed data if needed
    }

    /**
     * Get a random user ID from the provided array of user IDs.
     *
     * @param array $userIds
     * @return mixed
     */
    private function getRandomUserId(array $userIds)
    {
        return $userIds[array_rand($userIds)];
    }
}
