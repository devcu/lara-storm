<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

class SoftDeleteCountry extends Country
{
    use \Laralips\Storm\Database\Traits\SoftDelete;
}
