<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class NullablePost extends Post
{
    use \Laralips\Storm\Database\Traits\Nullable;

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array List of attributes to nullify
     */
    protected $nullable = [
        'author_nickname',
    ];
}
