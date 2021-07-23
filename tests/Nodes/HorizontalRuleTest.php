<?php

use Litlife\JsonToBBCode\Nodes\HorizontalRule;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class HorizontalRuleTest extends TestCase
{
    public function test()
    {
        $bb = '[hr]';

        $jsonString = <<<EOF
 {
  "type": "doc",
  "content": [
    {
      "type": "paragraph"
    },
    {
      "type": "horizontalRule"
    },
    {
      "type": "paragraph"
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(HorizontalRule::class)
            ->render($jsonArray));
    }
}
