<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;
use App\User;
use App\Post;
use App\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Artisan;

class SampleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:sample-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert sample CMS data.';
    /**
     * Faker Generator
     *
     * @var Generator
     */
    protected $faker;


    /**
     * Create a new command instance.
     * @param Faker $faker
     * @return mixed
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = $this->ask('How many users do you want to create?',10);

        $categories = $this->ask('How many categories do you want to create?',10);

        $posts = $this->ask('How many posts per user do you want to create?',10);

        // Drop all tables with migrate:fresh

        Artisan::call('migrate:fresh');
        $this->line('All tables dropped.');

        Artisan::call('db:seed');
        $this->line('Role table seeded.');

        // Create users

        // Get admin role
        $role = Role::find(1);

        // Create admin users

        $newUsers = factory(User::class,intval($users))->create()->each(function($user) use ($role) {

            $user->roles()->attach($role->id);

        });

        $this->line($users .' dummy admin users created.');

        // Create Categories

        $newCategories = factory(Category::class,intval($categories))->create();
        $this->line($categories .' dummy categories created.');

        $categories = Category::all();

        $categoriesIds = collect([]);

        foreach ($categories as $category) {

            $categoriesIds->push($category->id);

        }

        // Create posts

        foreach ($newUsers as $newUser) {

            for ($i = 1; $i <= intval($posts); $i++) {

                $body = $this->faker->paragraph(20);
                $excerpt = substr($body,0,200) . '...';


                $post = Post::create([
                    'user_id' => $newUser->id,
                    'title' => $this->faker->catchPhrase(),
                    'body' => $body,
                    'excerpt' => $excerpt,
                    'slug' => 'postslug-' . $newUser->id . '-' . $i,
                    'published' => true,
                ]);

                // Add Categories_Posts Relationship

                $post->categories()->attach($categoriesIds->random());

            }

        }

        $this->line($posts . ' dummy posts per user have been created.');




        $this->info('Sample Data created.');

    }
}
