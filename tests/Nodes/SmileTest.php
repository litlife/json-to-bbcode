<?php

use Litlife\JsonToBBCode\Nodes\Smile;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class SmileTest extends TestCase
{
    public function testAddSmile()
    {
        $bb = 'Тест :died:  :hoo:';

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
          "text": "Тест "
        },
        {
          "type": "hardBreak"
        },
        {
          "type": "smile",
          "attrs": {
            "src": "http://example.com/storage/smiles/80.gif",
            "width": 43,
            "height": 34,
            "simple_form": ":died:"
          }
        },
        {
          "type": "text",
          "text": "  "
        },
        {
          "type": "smile",
          "attrs": {
            "src": "http://example.com/storage/smiles/72.gif",
            "width": 44,
            "height": 46,
            "simple_form": ":hoo:"
          }
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(Smile::class)
            ->render($jsonArray));
    }

    public function testAddSmileWithoutSimpleForm()
    {
        $bb = 'Тест ';

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
          "text": "Тест "
        },
        {
          "type": "smile",
          "attrs": {
            "src": "http://example.com/storage/smiles/72.gif",
            "width": 44,
            "height": 46
          }
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(Smile::class)
            ->render($jsonArray));
    }
}
