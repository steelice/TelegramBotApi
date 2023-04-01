<?php

namespace TelegramBot\Api\Types\BotCommandScope;

class BotCommandScopeChat extends BotCommandScopeDefault
{
    static protected $requiredParams = ['type', 'chat_id'];

    static protected $map = [
        'type' => true,
        'chat_id' => true,
    ];

    protected string $type = 'chat';
    protected ?string $chat_id = null;

    public function __construct($chat_id = null)
    {
        $this->chat_id = $chat_id;
    }

    /**
     * @return string|null
     */
    public function getChatId(): ?string
    {
        return $this->chat_id;
    }

    /**
     * @param string|null $chat_id
     * @return BotCommandScopeChat
     */
    public function setChatId(?string $chat_id): BotCommandScopeChat
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
