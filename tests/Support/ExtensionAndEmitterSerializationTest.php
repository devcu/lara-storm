<?php

use Laralips\Storm\Extension\Extendable;

class ExtensionAndEmitterSerializationTest extends TestCase
{
    /**
     * Test whether nested closures in two different traits get serialized properly.
     */
    public function testTraitSynchronisationSynergy()
    {
        $test = "foobar";
        ExtendableEmitter::extend(function ($class) use ($test) {
            $class->bindEvent($test, function () use ($test) {
                ExtendableEmitter::$output = $test;
            });
        });
        $instance = new ExtendableEmitter();
        $serialized = serialize($instance);
        $unserialized = unserialize($serialized);
        $unserialized->fireEvent($test);
        $this->assertEquals($test, ExtendableEmitter::$output);
    }
}

class ExtendableEmitter extends Extendable
{
    use \Laralips\Storm\Support\Traits\Emitter;

    /**
     * @var string $output used for keeping a testable variable as references don't survive serialisation
     */
    public static $output;
}
