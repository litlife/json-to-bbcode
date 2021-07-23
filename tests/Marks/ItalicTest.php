<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Italic;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class ItalicTest extends TestCase
{
    public function test()
    {
        $bb = '[i]Example text using i[/i] and [i]some example text using em[/i]';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example text using i',
                            'marks' => [
                                [
                                    'type' => 'italic',
                                ],
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => ' and ',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'some example text using em',
                            'marks' => [
                                [
                                    'type' => 'italic',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($bb, (new Renderer)->clearNodes()->clearMarks()->addMark(Italic::class)->render($json));
    }
}
