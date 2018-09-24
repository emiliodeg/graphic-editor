<?php

declare(strict_types=1);

namespace GraphicEditor\Shapes;

use GraphicEditor\Decorator\Factory as DecoratorFactory;
use GraphicEditor\Interfaces\DecorableInterface;
use GraphicEditor\Interfaces\DecoratorInterface;

/**
 * Class ShapeAbstract
 *
 * @package GraphicEditor\Shapes
 */
abstract class ShapeAbstract implements DecorableInterface
{
    /**
     * π value
     *
     * @var float
     */
    const PI = 3.1415;

    /**
     * Float precision
     *
     * @var int
     */
    const PRECISION = 4;

    /**
     * Decorators of shapes
     *
     * @var DecoratorInterface[]
     */
    private $decorators = [];

    /**
     * @inheritdoc
     */
    public function addDecorator(DecoratorInterface $decorator): DecorableInterface
    {
        $this->decorators[] = $decorator;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function removeDecorators(): DecorableInterface
    {
        $this->decorators = [];

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setDecoratorsFromArray(array $decorators): DecorableInterface
    {
        $this->removeDecorators();

        foreach ($decorators as $decorator) {
            if (!isset($decorator['decorator'])) {
                continue;
            }

            try {
                $this->addDecorator(DecoratorFactory::factory($decorator));
            } catch (\Exception $e) {
                continue; // bad formed decorator definition
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function save(string $fileName): bool
    {
        return file_put_contents($this->render(), $fileName) !== false;
    }
}
