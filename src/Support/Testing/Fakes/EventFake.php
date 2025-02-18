<?php namespace Laralips\Storm\Support\Testing\Fakes;

use Laralips\Storm\Events\Dispatcher;
use Laralips\Storm\Support\Arr;

class EventFake extends \Illuminate\Support\Testing\Fakes\EventFake
{
    // Alias the fire() method to parent's dispatch() method
    public function fire($event, $payload = [], $halt = false)
    {
        return parent::dispatch($event, $payload, $halt);
    }
}
