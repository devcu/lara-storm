<?php

namespace Laralips\Storm\Tests\Database\Relations;

use Laralips\Storm\Database\Model;
use Laralips\Storm\Tests\Database\Fixtures\Author;
use Laralips\Storm\Tests\Database\Fixtures\Phone;
use Laralips\Storm\Tests\Database\Fixtures\User;
use Laralips\Storm\Tests\DbTestCase;

class HasOneThroughTest extends DbTestCase
{
    public function testGet()
    {
        Model::unguard();
        $phone = Phone::create(['number' => '08 1234 5678']);
        $author = Author::create(['name' => 'Stevie', 'email' => 'stevie@email.tld']);
        $user = User::create(['name' => 'Stevie', 'email' => 'stevie@email.tld']);
        Model::reguard();

        // Set data
        $author->phone = $phone;
        $author->user = $user;
        $author->save();

        $user = User::with([
            'phone'
        ])->find($user->id);

        $this->assertEquals($phone->id, $user->phone->id);
    }

    public function testGetLaravelRelation()
    {
        Model::unguard();
        $phone = Phone::create(['number' => '08 1234 5678']);
        $author = Author::create(['name' => 'Stevie', 'email' => 'stevie@email.tld']);
        $user = User::create(['name' => 'Stevie', 'email' => 'stevie@email.tld']);
        Model::reguard();

        // Set data
        $author->phone = $phone;
        $author->user = $user;
        $author->save();

        $user = User::with([
            'contactNumber'
        ])->find($user->id);

        $this->assertEquals($phone->id, $user->contactNumber->id);
    }
}
