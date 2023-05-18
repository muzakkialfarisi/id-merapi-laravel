<?php

namespace App\Listeners\AfterAPIExecuted;

use App\Events\AfterAPIExecuted;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\Log;

class SendTelegram
{
    public function __construct()
    {
    }

    public function handle(AfterAPIExecuted $event)
    {
        $data = $event['data'];

        if (isset($data)) {
            $data = $data['telegram'];
            try {
                (new Client())->request(
                    'POST',
                    config('tele.base_url') . '/bot' . config('tele.merapi_bot_id') . '/sendMessage?chat_id=' . $data['chat_id'] . '&text=' . $data['text']
                );
            } catch (RequestException $e) {
                Log::info($e);
            }
        }
    }
}
