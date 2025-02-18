<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class UserLaravelWithSoftAuthorAndSoftDelete extends UserLaravelWithSoftAuthor
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
