<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(Request $request) {
        $api = $request->getContent();

        $token = env('BOT_TOKEN');

        $output = json_decode($api, true);
        $chat_id = $output['message']['chat']['id'];
        $message = $output['message']['text'];
        $callback_query = $output['callback_query'];
        $data = $callback_query['data'];
        $message_id = $callback_query['message']['message_id'];
        $chat_id_in = $callback_query['message']['chat']['id'];
        $first_name = $output['message']['from']['first_name'];


    }
}
