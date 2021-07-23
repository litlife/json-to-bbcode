<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Attrs\TextAlign;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class TextAlignTest extends TestCase
{
    public function test()
    {
        $bb = '[left]test[/left]';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "attrs": {
        "textAlign": "left"
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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()->addAttr(TextAlign::class)->render($jsonArray));
    }
}
