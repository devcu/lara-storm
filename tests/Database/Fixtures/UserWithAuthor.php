<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class UserWithAuthor extends User
{
    public $hasOne = [
        'author' => [Author::class, 'key' => 'user_id', 'delete' => true],
    ];
}
