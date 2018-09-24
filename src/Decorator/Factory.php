<?php
declare(strict_types=1);

namespace GraphicEditor\Decorator;

use GraphicEditor\Interfaces\DecoratorInterface;

/**
 * Class Factory
 * @package GraphicEditor\Decorator
 */
abstract class Factory
{
    /**
     * Decorator factory
     *
     * @param array $data
     * @return DecoratorInterface
     * @throws \Exception
     */
    public static function factory(array $data): DecoratorInterface
    {
        switch ($data['decorator'] ?? null) {
            case 'border':
            case Border::class:
                return (new Border())->setFromArray($data);
                break;

            case 'background':
            case Background::class:
                return (new Background())->setFromArray($data);
                break;

            default:
                throw new \Exception('Decorator class unsupported');
                break;
        }
    }
}