<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use Faker\Factory as FakerFactory;

class GenerateFakeProjects extends Command
{
    protected $signature = 'generate:fake-projects';
    protected $description = 'Generate and insert fake projects into the database';

    public function handle()
    {
        $faker = FakerFactory::create();

        // You can specify the number of fake projects you want to create here
        $numberOfProjects = 15;

        for ($i = 0; $i < $numberOfProjects; $i++) {
            Project::create([
                'title' => $faker->sentence(3),
                'date' => $faker->date(),
                'collected' => $faker->randomNumber(4),
                'goal' => $faker->randomNumber(5),
                'short_description' => $faker->paragraph(2),
                'description' => $faker->paragraph(4),
                'published' => $faker->boolean,
            ]);
        }

        $this->info("{$numberOfProjects} fake projects have been generated and inserted.");
    }
}
