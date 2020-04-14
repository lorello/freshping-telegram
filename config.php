<?php

## TelegramBot info
define('BOT_TOKEN', getenv('BOT_TOKEN'));
define('BOT_USERNAME', getenv('BOT_USERNAME'));

## You can use you account or channel or gtoup for geting notification.
// Get you chat_id from @FalconGate_Bot
define('CHAT_ID', getenv('CHAT_ID'));

// if you want get only error state don't pass the variable ANY_STATE
define('ANY_STATE', getenv('ANY_STATE')=='true' ?: false);

## If you do not neet get notify for some of your monitoring website, You can add your site name in this array.
// You must use your monitoring website name.
$exceptionList = array();

define('LOG_FILE', getenv('LOG_FILE') ?: 'access.log');
