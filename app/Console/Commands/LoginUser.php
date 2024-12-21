<?php

namespace App\Console\Commands;
use App\Http\Controllers\ProductController;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
class LoginUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'login:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = Request::create('/login', 'POST', [
            'username' => 'guest',
            'password' => 'guest',
        ]);

        // Call the login method from AuthController
        $ProductController = new ProductController();
        $response = $ProductController->login($request);

        // Output the response to the terminal
        $this->info($response->getContent());
    }
}
