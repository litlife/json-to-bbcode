<?php

use Litlife\JsonToBBCode\Nodes\CodeBlock;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class CodeBlockTest extends TestCase
{
    public function test()
    {
        $bb = '[code]test[/code]';

        $jsonString = <<<EOF
  {
  "type": "doc",
  "content": [
    {
      "type": "codeBlock",
      "attrs": {
        "language": null
      },
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
            ->addNode(CodeBlock::class)
            ->render($jsonArray));
    }
}
