# PHP Telegram Bot Api

An extended native php wrapper for [Telegram Bot API](https://core.telegram.org/bots/api) without requirements. Supports all methods and types of responses.

## Bots: An introduction for developers
>Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats.

>You control your bots using HTTPS requests to [bot API](https://core.telegram.org/bots/api).

>The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
To learn how to create and set up a bot, please consult [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

## Installation

Via Composer

``` bash
$ composer require steelice/TelegramBotApi
```

## Usage

### API Wrapper
#### Send message
``` php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$bot->sendMessage($chatId, $messageText);
```
#### Send document
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$document = new \CURLFile('document.txt');

$bot->sendDocument($chatId, $document);
```
#### Send message with reply keyboard
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup(array(array("one", "two", "three")), true); // true for one-time keyboard

$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send message with inline keyboard
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'link', 'url' => 'https://core.telegram.org']
                ]
            ]
        );
        
$bot->sendMessage($chatId, $messageText, null, false, null, $keyboard);
```
#### Send media group
```php
$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');

$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
// Same for video
// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
$bot->sendMediaGroup($chatId, $media);
```

#### Client

```php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN');
    // or initialize with botan.io tracker api key
    // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');
    

    //Handle /ping command
    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });
    
    //Handle text messages
    $bot->on(function (\TelegramBot\Api\Types\Update $update) use ($bot) {
        $message = $update->getMessage();
        $id = $message->getChat()->getId();
        $bot->sendMessage($id, 'Your message: ' . $message->getText());
    }, function () {
        return true;
    });
    
    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
```

## Testing

``` bash
$ composer test
```

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
