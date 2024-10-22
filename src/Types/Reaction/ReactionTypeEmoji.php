<?php

namespace TelegramBot\Api\Types\Reaction;

use TelegramBot\Api\BaseType;

class ReactionTypeEmoji extends BaseType
{
    protected static $requiredParams = ['emoji'];

    protected static $map = [
        'type' => true,
        'emoji' => true,
    ];

    protected string $emoji;

    protected string $type = 'emoji';

    public function __construct(string $emoji)
    {
        $this->emoji = $emoji;
    }

    public function getEmoji(): string
    {
        return $this->emoji;
    }

    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
