<?php

namespace App\Console\Commands;

use App\Exceptions\ApiException;
use Illuminate\Console\Command;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class GetApiResources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-api-resources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting resources from reqres API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://reqres.in/api/unknown');
        
        // Check if service unavailable
        if (!$response->successful() || $response->status() !== JsonResponse::HTTP_OK) {
            throw new ApiException('API request failed', $response->status());
        }
        
        $resources = $response->json()['data'];

        foreach ($resources as $resource) {
            // If user is already in DB, skip loop
            $existing = DB::select('select * from resources where id = ?', [$resource['id']]);
            if (!empty($existing)) continue;

            DB::insert('insert into resources (id, name, year, color, pantone_value) values (?, ?, ?, ?, ?)', [$resource['id'], $resource['name'], $resource['year'], $resource['color'], $resource['pantone_value']]);
        }

    }
}
