<?php

namespace Litlife\JsonToBBCode\Tests\Nodes;

use Litlife\JsonToBBCode\Nodes\Blockquote;
use Litlife\JsonToBBCode\Nodes\HardBreak;
use Litlife\JsonToBBCode\Nodes\Paragraph;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class HardBreakTest extends TestCase
{
    public function test()
    {
        $bb = '[quote]1111
2222
[/quote]3333
4444
';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "blockquote",
      "content": [
        {
          "type": "paragraph",
          "attrs": {
            "textAlign": "left"
          },
          "content": [
            {
              "type": "text",
              "text": "1111"
            },
            {
              "type": "hardBreak"
            },
            {
              "type": "text",
              "text": "2222"
            }
          ]
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
          "text": "3333"
        },
        {
          "type": "hardBreak"
        },
        {
          "type": "text",
          "text": "4444"
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
            ->addNode(Blockquote::class)
            ->addNode(Paragraph::class)
            ->addNode(HardBreak::class)
            ->render($jsonArray)
        );
    }
}
