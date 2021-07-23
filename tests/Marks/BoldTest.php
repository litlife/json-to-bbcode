<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Bold;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class BoldTest extends TestCase
{
    public function test()
    {
        $bb = '[b]Example text using strong[/b] and [b]some example text using b[/b]';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example text using strong',
                            'marks' => [
                                [
                                    'type' => 'bold',
                                ],
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => ' and ',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'some example text using b',
                            'marks' => [
                                [
                                    'type' => 'bold',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($bb, (new Renderer())->clearNodes()->clearMarks()->addMark(Bold::class)->render($json));
    }
}
