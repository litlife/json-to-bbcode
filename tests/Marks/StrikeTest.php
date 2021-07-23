<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Strike;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class StrikeTest extends TestCase
{
    public function test()
    {
        $bb = '[s]Example text using i[/s] and [s]some example text using em[/s]';

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
                                    'type' => 'strike',
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
                                    'type' => 'strike',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($bb, (new Renderer)->clearNodes()->addNode(Strike::class)->render($json));
    }
}
