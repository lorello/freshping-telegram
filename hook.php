<?php

// Get config variables
require __DIR__ . '/config.php';
require __DIR__ . '/vendor/autoload.php';

// Get data from webhook
$json_data = file_get_contents("php://input");

#if (empty($json_data))
#    die(file_get_contents('error.html'));

// Log webhook action
$current = date('[j/M/Y H:i:s]'). " $json_data \n";
file_put_contents(LOG_FILE, $current, FILE_APPEND);

$telegram = new Longman\TelegramBot\Telegram(BOT_TOKEN, BOT_USERNAME);
use Longman\TelegramBot\Request;

$data = [
    'chat_id' => CHAT_ID,
    'text'    => 'prova',
];

$result = Request::sendMessage($data);

$data = json_decode($json_data);
$check_state = $data->webhook_event_data->check_state_name;
$request_url = $data->webhook_event_data->request_url;
$request_start_time = date(
    'Y-m-d H:i:s T', 
    strtotime( $data->webhook_event_data->request_start_time )
);
$check_name = $data->webhook_event_data->check_name;

$message = "Check state changed to $check_state \n";
$message .= "URL tested: $request_url \n";
$message .= "test time: $request_start_time \n";

$data = [
    'chat_id' => CHAT_ID,
    'text'    => $message,
];

if ( ! in_array( $check_name, $exceptionList ) ) {
    file_put_contents(LOG_FILE, $message, FILE_APPEND);
    if ( ANY_STATE ) {
        $result = Request::sendMessage($data);
        file_put_contents(LOG_FILE, $result, FILE_APPEND);
    } elseif ( $check_state == 'Not Responding' ) {
        $result = Request::sendMessage($data);
        file_put_contents(LOG_FILE, $result, FILE_APPEND);
    }
}


