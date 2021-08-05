<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Attrs\TextAlign;
use Litlife\JsonToBBCode\Nodes\Paragraph;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class TextAlignWithParagraphTest extends TestCase
{
    public function test()
    {
        $bb = <<<EOF
test 1
test 2

EOF;

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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()
            ->addAttr(Paragraph::class)
            ->addAttr(TextAlign::class)->render($jsonArray));
    }

    public function test2()
    {
        $bb = <<<EOF
text1

text2
 
text3

EOF;

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
          "text": "text1"
        }
      ]
    },
    {
      "type": "paragraph",
      "attrs": {
        "textAlign": "left"
      }
    },
    {
      "type": "paragraph",
      "attrs": {
        "textAlign": "left"
      },
      "content": [
        {
          "type": "text",
          "text": "text2"
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
          "text": " "
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
          "text": "text3"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()
            ->addAttr(Paragraph::class)
            ->addAttr(TextAlign::class)->render($jsonArray));
    }
}
