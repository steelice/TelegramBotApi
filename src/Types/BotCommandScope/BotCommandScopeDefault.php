<?php

namespace TelegramBot\Api\Types\BotCommandScope;

use TelegramBot\Api\BaseType;
use TelegramBot\Api\TypeInterface;

class BotCommandScopeDefault extends BaseType implements TypeInterface
{
    static protected $requiredParams = ['type'];

    static protected $map = [
        'type' => true,
    ];

    protected string $type = 'default';

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
