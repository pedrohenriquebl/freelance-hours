<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Projects;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DatabaseSeeder extends Seeder
{
    /**eterize(): Argument #1 ($
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(200)
            ->create();

        User::query()->inRandomOrder()->limit(10)->get()
            ->each(fn(User $user) => Projects::factory()                
                ->create(['created_by' => $user->id])
            );
        
    }
}
