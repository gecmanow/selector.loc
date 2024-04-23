<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class BotController extends Controller
{
    public function index(Request $request)
    {
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

    public function getKeyboardAction()
    {
        $actions = Action::select(['name','callback_data'])->get();
        $keyboardAction = array(
            'reply_markup' => json_encode(array(
                'inline_keyboard' => array(
                    array(
                        array(
                            'text' => 'Зайти',
                            'callback_data' => '/department',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Перезвонить',
                            'callback_data' => '/department',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Назначить Zoom',
                            'callback_data' => '/department',
                        )
                    )
                ),
                'one_time_keyboard' => TRUE,
                'resize_keyboard' => TRUE,
            ))
        );
        return $res;
    }

    public function getKeyboardDepartment()
    {
        $keyboardDepartment = array(
            'reply_markup' => json_encode(array(
                'inline_keyboard' => array(
                    array(
                        array(
                            'text' => 'Прямые продажи',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Проектные продажи',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Снабжение',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'ВЭД',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'HR',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'ИТ и маркетинг',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Назад',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    )
                ),
                'one_time_keyboard' => TRUE,
                'resize_keyboard' => TRUE,
            ))
        );

        return $keyboardDepartment;
    }

    public function getKeyboardStaffDirectSales()
    {
        $keyboardStaffDirectSales = array(
            'reply_markup' => json_encode(array(
                'inline_keyboard' => array(
                    array(
                        array(
                            'text' => 'Сотрудник 1',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Сотрудник 2',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    ),
                    array(
                        array(
                            'text' => 'Сотрудник 3',
                            'callback_data' => '/keyboardStaffDirectSales',
                        )
                    )
                ),
                'one_time_keyboard' => TRUE,
                'resize_keyboard' => TRUE,
            ))
        );

        return $keyboardStaffDirectSales;
    }



    public function sendMessage($token, $response) {
        $ch = curl_init('https://api.telegram.org/bot' . $token . '/sendMessage');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_exec($ch);
        curl_close($ch);
    }
}
