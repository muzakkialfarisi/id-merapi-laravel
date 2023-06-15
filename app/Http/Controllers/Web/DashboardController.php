<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\ApiRepository;
use App\Repositories\FeatureRepository;
use App\Repositories\MainDealerRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $query['conditions'] = [
            [
                'field' => 'is_active',
                'value' => 1,
            ]
        ];

        $main_dealer = (new MainDealerRepository())
            ->count_list($query);

        $feature = (new FeatureRepository())
            ->count_list($query);

        $api = (new ApiRepository())
            ->count_list($query);

        $data = [
            'main_dealers'  => $main_dealer,
            'features'      => $feature,
            'apis'          => $api,
        ];

        return view('dashboard/index')->with(['data' => $data]);
    }

    public function LogoutProcess()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    
    // private $client;

    // public function __construct()
    // {
    //     $this->client = new Client();
    // }

    // public function Index()
    // {
    //     $api = $this->client->request(
    //         'POST',
    //         'https://api-dev-mihu.modakita.com/api/ticket-details/58704637033',
    //         [
    //             'headers' => [
    //                 'Authorization' => 'Bearer ' . 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vYXBpLWRldi1taWh1Lm1vZGFraXRhLmNvbS9hcGkvbG9naW4iLCJpYXQiOjE2ODY4MjcwNzksImV4cCI6MTY4NjgzMDY3OSwibmJmIjoxNjg2ODI3MDc5LCJqdGkiOiJmalJqQU9WeEw2czgyb3h3Iiwic3ViIjoiMzgiLCJwcnYiOiJjODI5MjIzODM1ZDExMTM4ZjA4YWNlNTZmZmE2NjI4YmMyNjgzY2I1In0.OWms-_1kxvMBqKs0a7ko8f8FRJYVgRodRezUBPu7xAw',
    //                 'Content-Type' => 'application/json',
    //             ]
    //         ]
    //     );

    //     $response = json_decode($api->getBody(), true);
    //     $data['ticket'] = $response['data'] ?? null;
    //     // dd($data['ticket']);
    //     return view('dashboard/index')->with(['data' => $data]);
    // }
}
