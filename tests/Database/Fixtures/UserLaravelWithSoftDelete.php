<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class UserLaravelWithSoftDelete extends UserLaravel
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
