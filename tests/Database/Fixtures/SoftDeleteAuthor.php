<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class SoftDeleteAuthor extends Author
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
