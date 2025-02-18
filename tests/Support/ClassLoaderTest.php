<?php

use Laralips\Storm\Filesystem\Filesystem;
use Laralips\Storm\Support\ClassLoader;

class ClassLoaderTest extends TestCase
{
    /** @var ClassLoader */
    protected $classLoader;

    public function setUp(): void
    {
        parent::setUp();

        $this->classLoader = new ClassLoader(
            new Filesystem(),
            dirname(__DIR__) . '/fixtures/classes',
            dirname(__DIR__) . '/fixtures/classes/classes.php'
        );

        $this->classLoader->register();

        $this->classLoader->autoloadPackage('Laralips\\Plugin', 'plugins/winter/plugin');
    }

    public function tearDown(): void
    {
        $this->classLoader->unregister();

        parent::tearDown();
    }

    public function testAliases()
    {
        $this->assertFalse(class_exists('OldOrg\Plugin\Classes\TestClass', false));
        $this->assertFalse(class_exists('OldOrg\Plugin\Models\TestModel', false));

        // Alias missing classes
        $this->classLoader->addAliases([
            'Laralips\Plugin\Classes\TestClass' => 'OldOrg\Plugin\Classes\TestClass',
            'Laralips\Plugin\Models\TestModel' => 'OldOrg\Plugin\Models\TestModel',
        ]);

        // Check that class identifies as both original and alias
        $newInstance = new \Laralips\Plugin\Classes\TestClass;
        $this->assertTrue($newInstance instanceof Laralips\Plugin\Classes\TestClass);
        $this->assertTrue($newInstance instanceof OldOrg\Plugin\Classes\TestClass);

        $this->assertTrue(class_exists('OldOrg\Plugin\Classes\TestClass'));
        $this->assertTrue(class_exists('OldOrg\Plugin\Models\TestModel'));

        $instance = new OldOrg\Plugin\Classes\TestClass;
        $this->assertInstanceOf('OldOrg\Plugin\Classes\TestClass', $instance);
        $this->assertInstanceOf('Laralips\Plugin\Classes\TestClass', $instance);

        // Alias a class that exists - the original should still be used
        $this->classLoader->addAliases([
            'NewOrg\Plugin\Classes\TestClass' => 'Laralips\Plugin\Classes\TestClass',
        ]);

        $instance = new Laralips\Plugin\Classes\TestClass;
        $this->assertInstanceOf('Laralips\Plugin\Classes\TestClass', $instance);
        $this->assertFalse(class_exists('NewOrg\Plugin\Classes\TestClass'));
    }

    public function testNamespaceAliases()
    {
        $this->assertFalse(class_exists('OldOrgTwo\Plugin\Classes\TestClass', false));
        $this->assertFalse(class_exists('OldOrgTwo\Plugin\Models\TestModel', false));

        // Alias missing classes
        $this->classLoader->addNamespaceAliases([
            'Laralips\Plugin' => 'OldOrgTwo\Plugin'
        ]);

        $this->assertTrue(class_exists('OldOrgTwo\Plugin\Classes\TestClass'));
        $this->assertTrue(class_exists('OldOrgTwo\Plugin\Models\TestModel'));

        $instance = new OldOrgTwo\Plugin\Classes\TestClass;
        $this->assertInstanceOf('OldOrgTwo\Plugin\Classes\TestClass', $instance);
        $this->assertInstanceOf('Laralips\Plugin\Classes\TestClass', $instance);

        // Alias a class that exists - the original should still be used
        $this->classLoader->addAliases([
            'NewOrgTwo\Plugin' => 'Laralips\Plugin',
        ]);
        $instance = new Laralips\Plugin\Classes\TestClass;
        $this->assertInstanceOf('Laralips\Plugin\Classes\TestClass', $instance);
        $this->assertFalse(class_exists('NewOrgTwo\Plugin\Classes\TestClass'));
    }

    public function testClassesExist()
    {
        // Classes should be available from the class loader
        $this->assertTrue(class_exists('Laralips\Plugin\Classes\TestClass'));
        $this->assertTrue(class_exists('Laralips\Plugin\Models\TestModel'));

        // Classes should not be available from the class loader (missing classes)
        $this->assertFalse(class_exists('Laralips\Plugin\Classes\MissingClass'));
        $this->assertFalse(class_exists('Laralips\Plugin\Widgets\MissingWidget'));

        // Class should not be available from the class loader (misnamed namespace)
        $this->assertFalse(class_exists('Laralips\Plugin\Controllers\TestController'));
    }
}
