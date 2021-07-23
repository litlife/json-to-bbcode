<?php

use Litlife\JsonToBBCode\Nodes\Spoiler;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class SpoilerTest extends TestCase
{
    public function test()
    {
        $bb = '[spoiler]test[/spoiler]';

        $jsonString = <<<EOF
  {
  "type": "doc",
  "content": [
    {
      "type": "spoiler",
      "attrs": {
        "show": true
      },
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
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->clearMarks()->clearAttrs()->addNode(Spoiler::class)->render($jsonArray));
    }

    public function testWithTitle()
    {
        $jsonString = <<<EOF
  {
  "type": "doc",
  "content": [
    {
      "type": "spoiler",
      "attrs": {
        "show": true,
        "title": "spoiler_title"
      },
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
  ]
}
EOF;

        $bb = '[spoiler="spoiler_title"]test[/spoiler]';

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->clearMarks()->clearAttrs()->addNode(Spoiler::class)->render($jsonArray));
    }
}
