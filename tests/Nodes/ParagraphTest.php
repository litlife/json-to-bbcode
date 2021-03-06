<?php

use Litlife\JsonToBBCode\Nodes\Paragraph;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class ParagraphTest extends TestCase
{
    public function test()
    {
        $bb = <<<EOF
test
test2

EOF;


        $jsonString = <<<EOF
    {
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "text": "test"
        }
      ]
    },
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "text": "test2"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(Paragraph::class)
            ->render($jsonArray));
    }

    public function test2()
    {
        $bb = <<<EOF
text 1

text 2

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
          "text": "text 1"
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
          "text": "text 2"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->clearAttrs()
            ->addNode(Paragraph::class)
            ->render($jsonArray));
    }

}
