<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class SoftDeleteUser extends User
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
