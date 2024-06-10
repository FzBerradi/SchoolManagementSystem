<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
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

        // Seed data for the documents table with dynamic user IDs
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Attestation de scolarité',
            'status' => 'accepted',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Attestation de scolarité',
            'status' => 'accepted',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Attestation de scolarité',
            'status' => 'accepted',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Attestation de scolarité',
            'status' => 'accepted',
        ]);

        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Relevé de notes',
            'status' => 'pending',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Relevé de notes',
            'status' => 'pending',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Relevé de notes',
            'status' => 'pending',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Relevé de notes',
            'status' => 'pending',
        ]);

        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Convention de stage',
            'status' => 'refused',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Convention de stage',
            'status' => 'refused',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Convention de stage',
            'status' => 'refused',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Convention de stage',
            'status' => 'refused',
        ]);
        Document::create([
            'user_id' => $this->getRandomUserId($userIds),
            'type' => 'Convention de stage',
            'status' => 'refused',
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
