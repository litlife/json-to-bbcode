<?php

use Litlife\JsonToBBCode\Marks\Strike;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class RendererAddMarkTest extends TestCase
{
    public function test()
    {
        $renderer = (new Renderer)
            ->clearMarks()
            ->addMark(Strike::class);

        $this->assertEquals([
            Litlife\JsonToBBCode\Marks\Strike::class
        ], $renderer->getMarks());
    }
}
