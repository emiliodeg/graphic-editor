<?php

declare(strict_types=1);

// This only works on CLI
if (PHP_SAPI !== "cli") {
    exit("Only works on CLI");
}

use GraphicEditor\Shapes\Circle;
use GraphicEditor\Shapes\Rectangle;

require_once 'vendor/autoload.php';

$graphicEditor = new \GraphicEditor\GraphicEditor();

$graphicEditor->addShape(new Circle())
    ->addShape(new Rectangle());

$graphicEditor->import([
    // #1 circle
    [
        'type' => 'circle',
        'params' => [
            'radius' => 1.25
        ],
        'decorators' => [
            'border' => [
                'decorator' => \GraphicEditor\Decorator\Border::class, // or border
                'width' => 5,
                'color' => 'ff0000', // red
            ]
        ]
    ],

    // #2 circle
    [
        'type' => 'circle',
        'params' => [
            'radius' => 5,
        ],
        'decorators' => [
            'border' => [
                'decorator' => 'border',
                'width' => 5,
                'color' => 'ff0000', // red
            ],
            'background' => [
                'decorator' => \GraphicEditor\Decorator\Background::class, // or background
                'width' => 5,
                'color' => '00ff00', // green
            ],
        ]
    ],

    // #3 rectangle
    ['type' => 'rectangle', 'params' => ['height' => 3, 'width' => '2.98']],

    // #4 rectangle
    ['type' => 'rectangle', 'params' => ['height' => 4.3698764, 'width' => 4.3698766]],

    // unsupported data
    ['type' => 'circle', 'params' => null],
    ['type' => 'unsupported', 'params' => ['height' => 4.3698764, 'width' => 4.3698766]],
]);

/**
 * Helper to show array
 *
 * @param string $title
 * @param array $data
 * @return string
 */
function renderArray(string $title, array $data): string
{
    $result = $title . PHP_EOL;
    $line = 0;

    if (!$data) {
        return $result . 'NO DATA';
    }

    foreach ($data as $value) {
        $result .= ++$line . ' = ' . $value . PHP_EOL;
    }

    return $result;
}

// show help or execute some command
switch ($_SERVER['argv'][1] ?? null) {
    case "areas":
        echo renderArray("AREAS", $graphicEditor->getAreas());
        break;

    case "perimeters":
        echo renderArray("PERIMETERS", $graphicEditor->getPerimeters());
        break;

    case "save-all":
        echo "SAVE ALL SHAPES" . PHP_EOL;
        echo "Saved shapes: " . $graphicEditor->save();
        break;

    case "help":
    default:
        echo "GRAPHIC EDITOR Ver: 0.1.0" . PHP_EOL;
        echo "Supported commands:" . PHP_EOL . PHP_EOL;

        echo "areas: shows all the areas of the shapes" . PHP_EOL;
        echo "perimeters: shows all the perimeters of the shapes" . PHP_EOL;
        echo "save-all: save all shapes in files (dummy)" . PHP_EOL;
        echo "help: show general information and commands" . PHP_EOL;
        break;
}
