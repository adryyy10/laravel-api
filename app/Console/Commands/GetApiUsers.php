<?php

namespace App\Console\Commands;

use App\Exceptions\ApiException;
use Illuminate\Console\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetApiUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-api-users {--page=1 : The page number to fetch from the API}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting users from reqres API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $page = $this->option('page');
        $response = Http::get('https://reqres.in/api/users?page='.$page);
        
        // Check if service unavailable
        if (!$response->successful() || $response->status() !== JsonResponse::HTTP_OK) {
            throw new ApiException('API request failed', $response->status());
        }
        
        $users = $response->json()['data'];

        foreach ($users as $user) {
            // If user is already in DB, skip loop
            $existing = DB::select('select * from users where id = ?', [$user['id']]);
            if (!empty($existing)) continue;

            DB::insert('insert into users (id, email, first_name, last_name, avatar) values (?, ?, ?, ?, ?)', [$user['id'], $user['email'], $user['first_name'], $user['last_name'], $user['avatar']]);
        }

    }
}
