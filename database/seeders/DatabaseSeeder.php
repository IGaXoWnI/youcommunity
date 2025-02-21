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
        Event::factory(5)->create()->each(function ($event) {
            Comment::factory(3)->create(['event_id' => $event->id]);
        });
        Rsvp::factory(20)->create();
    }
}
