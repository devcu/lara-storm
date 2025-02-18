<?php namespace Laralips\Storm\Database;

use Laralips\Storm\Extension\ExtensionBase;

/**
 * Base class for model behaviors.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class ModelBehavior extends ExtensionBase
{
    /**
     * @var \Laralips\Storm\Database\Model Reference to the extended model.
     */
    protected $model;

    /**
     * Constructor
     * @param \Laralips\Storm\Database\Model $model The extended model.
     */
    public function __construct($model)
    {
        $this->model = $model;
    }
}
