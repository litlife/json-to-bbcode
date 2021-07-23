<?php

use Litlife\JsonToBBCode\Marks\Link;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    public function testLinkWithContent()
    {
        $bb = '[url="https://example.com"]test[/url]';

        $jsonString = <<<EOF
        {
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "marks": [
            {
              "type": "link",
              "attrs": {
                "href": "https://example.com",
                "target": "_blank"
              }
            }
          ],
          "text": "test"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->clearMarks()->addMark(Link::class)->render($jsonArray));
    }

    public function testLinkWithoutContent()
    {
        $bb = '[url="https://example.com"]https://example.com[/url]';

        $jsonString = <<<EOF
        {
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "marks": [
            {
              "type": "link",
              "attrs": {
                "href": "https://example.com",
                "target": "_blank"
              }
            }
          ]
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->clearMarks()->addMark(Link::class)->render($jsonArray));
    }
}
