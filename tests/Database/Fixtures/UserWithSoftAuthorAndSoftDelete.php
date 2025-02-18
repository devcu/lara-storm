<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class UserWithSoftAuthorAndSoftDelete extends UserWithSoftAuthor
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
