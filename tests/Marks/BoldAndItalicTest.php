<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Bold;
use Litlife\JsonToBBCode\Marks\Italic;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class BoldAndItalicTest extends TestCase
{
    public function test()
    {
        $bb = '[b][i]Example text using i[/i][/b] and [b][i]some example text using em[/i][/b]';

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
                                    'type' => 'bold',
                                ],
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
                                    'type' => 'bold',
                                ],
                                [
                                    'type' => 'italic',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($bb, (new Renderer)->clearNodes()->clearMarks()->addMark(Bold::class)->addMark(Italic::class)->render($json));
    }
}
