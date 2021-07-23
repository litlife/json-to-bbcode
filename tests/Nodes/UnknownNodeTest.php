<?php

namespace Litlife\JsonToBBCode\Tests\Nodes;

use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class UnknownNodeTest extends TestCase
{
    public function test()
    {
        $bb = 'test';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "unknown",
      "content": [
        {
          "type": "text",
          "text": "test"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->clearMarks()
            ->render($jsonArray)
        );
    }
}
