<?php

declare(strict_types=1);

namespace GraphicEditor\Shapes;

use GraphicEditor\Interfaces\ShapeInterface;

/**
 * Class Circle
 * @package GraphicEditor\Shapes
 */
class Circle extends ShapeAbstract implements ShapeInterface
{
    /**
     * Radius
     *
     * @var null|float
     */
    private $radius = null;

    /**
     * Set circle parameters from array
     *
     * @inheritdoc
     * @throws \InvalidArgumentException
     */
    public function setFromArray(array $params): ShapeInterface
    {
        if (!isset($params['radius']) || !is_numeric($params['radius'])) {
            throw new \InvalidArgumentException('Circle: Numeric radius is required');
        }

        $this->setRadius((float) $params['radius']);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return 'circle';
    }

    /**
     * Get radius circle
     *
     * @return float|null
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * Set radius circle
     *
     * @param float|null $radius
     * @return Circle
     */
    public function setRadius(float $radius): Circle
    {
        $this->radius = abs($radius);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getArea(): float
    {
        return round(self::PI * $this->getRadius() ** 2, self::PRECISION);
    }

    /**
     * @inheritDoc
     */
    public function getPerimeter(): float
    {
        return round(2 * self::PI * $this->getRadius(), self::PRECISION);
    }

    /**
     * @inheritDoc
     */
    public function save(string $fileName): bool
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        // TODO: Implement render() method.
    }


}
