<?php

namespace Laralips\Storm\Tests\Database\Fixtures;

use Laralips\Storm\Database\Relations\HasOne;

class UserLaravelWithSoftAuthor extends UserLaravel
{
    public function author(): HasOne
    {
        return $this->hasOne(SoftDeleteAuthor::class, 'user_id')->softDeletable();
    }
}
