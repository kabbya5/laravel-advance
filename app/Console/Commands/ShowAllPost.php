<?php

namespace App\Console\Commands;
// https://www.youtube.com/watch?v=8RvC4XOOlQ8
use App\Models\Post;
use Illuminate\Console\Command;

class ShowAllPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all posts';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::all();
        print_r($posts->toArray());

        echo $posts->count();
    }
}
