<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Attrs\TextAlign;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class TextAlignTest extends TestCase
{
    public function test()
    {
        $bb = '[right]test[/right]';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "attrs": {
        "textAlign": "right"
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

    public function testDontOutputDefault()
    {
        $bb = 'test';

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

    public function testDontOutputDefault2()
    {
        $bb = 'test 1test 2';

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
          "text": "test 1"
        }
      ]
    },
    {
      "type": "paragraph",
      "attrs": {
        "textAlign": "left"
      },
      "content": [
        {
          "type": "text",
          "text": "test 2"
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
