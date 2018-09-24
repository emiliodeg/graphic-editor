<?php
declare(strict_types=1);

namespace GraphicEditor\Interfaces;

/**
 * Interface DecorableInterface
 * @package GraphicEditor\Interfaces
 */
interface DecorableInterface
{
    /**
     * @param array $decorators
     * @return DecorableInterface
     */
    public function setDecoratorsFromArray(array $decorators): DecorableInterface;

    /**
     * @param DecoratorInterface $decorator
     * @return DecorableInterface
     */
    public function addDecorator(DecoratorInterface $decorator): DecorableInterface;

    /**
     * @return DecorableInterface
     */
    public function removeDecorators(): DecorableInterface;
}
