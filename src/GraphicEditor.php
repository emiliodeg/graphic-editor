<?php

declare(strict_types=1);

namespace GraphicEditor;

use GraphicEditor\Interfaces\ShapeInterface;

/**
 * Class GraphicEditor
 * @package GraphicEditor
 */
class GraphicEditor
{
    /**
     * Registered shapes
     *
     * @var ShapeInterface[]
     */
    private $shapes = [];

    /**
     * Data to process
     *
     * @var array
     */
    private $data = [];

    /**
     * Add shape support
     *
     * @param ShapeInterface $shape
     * @return GraphicEditor
     */
    public function addShape(ShapeInterface $shape): self
    {
        $this->shapes[$shape->getType()] = $shape;

        return $this;
    }

    /**
     * Remove registered shape
     *
     * @param string $type
     * @return GraphicEditor
     */
    public function removeShape(string $type): self
    {
        if (isset($this->shapes[$type])) {
            unset($this->shapes[$type]);
        }

        return $this;
    }

    /**
     * Import data to process
     *
     * @param array|string $data string: json or path file
     * @return GraphicEditor
     * @throws \Exception Json error
     * @throws \Exception Data are not array
     */
    public function import($data): self
    {
        // if data of shapes is a string, it can be a json or path file
        if (is_string($data)) {
            if (is_file($data) && is_readable($data)) {
                $data = file_get_contents($data);
            }

            $data = json_decode($data, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Data shapes Json Error: ' . json_last_error_msg());
            }
        }

        if (!is_array($data)) {
            throw new \Exception('Shapes must be an array');
        }

        // supported types
        $types = array_keys($this->shapes);

        // filter supported shapes
        $data = array_filter(
            $data,
            function ($shape) use ($types): bool {
                return is_array($shape) && // must be an array
                    isset($shape['type'], $shape['params']) && // must have declared an index type and params
                    array_search($shape['type'], $types) !== false && // must have supported type
                    is_array($shape['params']); // params must be an array
            }
        );

        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getAreas(): array
    {
        $result = [];

        foreach ($this->data as $shape) {
            $result[] = $this->shapes[$shape['type']]->setFromArray($shape['params'])->getArea();
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getPerimeters(): array
    {
        $result = [];

        foreach ($this->data as $shape) {
            $result[] = $this->shapes[$shape['type']]->setFromArray($shape['params'])->getPerimeter();
        }

        return $result;
    }
}
