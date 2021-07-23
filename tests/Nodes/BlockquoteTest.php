<?php

use Litlife\JsonToBBCode\Nodes\Blockquote;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class BlockquoteTest extends TestCase
{
    public function test()
    {
        $bb = '[quote]test[/quote]';

        $jsonString = <<<EOF
 {
  "type": "doc",
  "content": [
    {
      "type": "blockquote",
      "content": [
        {
          "type": "paragraph",
          "content": [
            {
              "type": "text",
              "text": "test"
            }
          ]
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->addNode(Blockquote::class)->render($jsonArray));
    }
}
