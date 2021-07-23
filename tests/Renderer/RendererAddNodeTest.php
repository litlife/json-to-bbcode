<?php

use Litlife\JsonToBBCode\Nodes\Blockquote;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class RendererAddNodeTest extends TestCase
{
    public function test()
    {
        $renderer = (new Renderer)
            ->clearNodes()
            ->addNode(Blockquote::class);

        $this->assertEquals([
            Litlife\JsonToBBCode\Nodes\Blockquote::class
        ], $renderer->getNodes());
    }
}
