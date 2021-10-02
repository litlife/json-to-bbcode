<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\TextStyle;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class TextStyleTest extends TestCase
{
    public function testFontFamily()
    {
        $bb = '[font="Comic Sans MS"]test[/font]';

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
              "type": "textStyle",
              "attrs": {
                "fontFamily": "Comic Sans MS"
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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()->addMark(TextStyle::class)->render($jsonArray));
    }

    public function testColor()
    {
        $bb = '[color=#3333ff]test[/color]';

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
              "type": "textStyle",
              "attrs": {
                "fontColor": "#3333ff"
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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()->addMark(TextStyle::class)->render($jsonArray));
    }

    public function testEmptyFontColorOrFont()
    {
        $bb = '[font="Courier New"]какого[/font] [color=#3333ff]вообразитъ[/color]';

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
          "marks": [
            {
              "type": "textStyle",
              "attrs": {
                "fontFamily": "Courier New",
                "fontColor": null
              }
            }
          ],
          "text": "какого"
        },
        {
          "type": "text",
          "text": " "
        },
        {
          "type": "text",
          "marks": [
            {
              "type": "textStyle",
              "attrs": {
                "fontFamily": "",
                "fontColor": "#3333ff"
              }
            }
          ],
          "text": "вообразитъ"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()->addMark(TextStyle::class)->render($jsonArray));
    }

    public function testNullFontColor()
    {
        $bb = '[font="Arial Black"]Текст[/font]';

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
          "marks": [
            {
              "type": "textStyle",
              "attrs": {
                "fontFamily": "Arial Black",
                "fontColor": null
              }
            }
          ],
          "text": "Текст"
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->clearAttrs()->addMark(TextStyle::class)->render($jsonArray));
    }
}
