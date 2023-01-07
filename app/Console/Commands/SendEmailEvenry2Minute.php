<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class SendEmailEvenry2Minute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test scheduling-task with send mail';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Product::latest()->get();

        foreach ($products as $product)
        {
            \Mail::to('kabbya44@gmail.com')->send(new SendMail($product));
        }

        $this->info('success');

    }
}
