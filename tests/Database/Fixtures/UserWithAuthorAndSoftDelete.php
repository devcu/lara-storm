<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class UserWithAuthorAndSoftDelete extends UserWithAuthor
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
