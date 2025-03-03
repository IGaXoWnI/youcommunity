<?php

namespace Database\Seeders;

use App\Models\Rsvp;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Event;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // Insert meaningful events
        Event::insert([
            [
                'title' => 'Community Clean-Up Day',
                'description' => 'Join us for a day of cleaning up our local park. Supplies will be provided.',
                'location' => 'Central Park',
                'date' => '2023-09-15',
                'user_id' => 1, // Assuming user with ID 1 exists
                'max_participants' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Local Art Exhibition',
                'description' => 'Explore the works of local artists at the community center.',
                'location' => 'Community Center',
                'date' => '2023-10-01',
                'user_id' => 2, // Assuming user with ID 2 exists
                'max_participants' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Charity Run for Health',
                'description' => 'Participate in a charity run to raise funds for local health initiatives.',
                'location' => 'City Stadium',
                'date' => '2023-11-05',
                'user_id' => 3, // Assuming user with ID 3 exists
                'max_participants' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Optionally, you can still create fake comments and RSVPs
        Event::factory(5)->create()->each(function ($event) {
            Comment::factory(3)->create(['event_id' => $event->id]);
        });
        Rsvp::factory(20)->create();
    }
}
