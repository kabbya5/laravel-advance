<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class CreatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Post trough artisan';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask('Whis is the Post tilte');
        $post_body = $this->ask('Gives Post body');
        $post_img = $this->ask('what is post image url');

        Post::create([
            'post_title' => $title,
            'post_body' => $post_body,
            'post_img' => $post_img,
            'view_count' => rand(20, 60),
            'post_excerpt' => $post_body,
            'slug' => $title,
            'author_id' => User::all()->random()->id,
        ]);

        $this->info('Post has been create !');
    }
}
