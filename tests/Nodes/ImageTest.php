<?php

use Litlife\JsonToBBCode\Nodes\Image;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testImageWithSizeAndSrc()
    {
        $bb = '[img=300x400]http://example.com/image.jpeg[/img]';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph"
    },
    {
      "type": "image",
      "attrs": {
        "src": "http://example.com/image.jpeg",
        "width": 300,
        "height": 400,
        "alt": ""
      }
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->addNode(Image::class)->render($jsonArray));
    }

    public function testImageWithoutSize()
    {
        $bb = '[img]http://example.com/image.jpeg[/img]';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph"
    },
    {
      "type": "image",
      "attrs": {
        "src": "http://example.com/image.jpeg",
        "alt": ""
      }
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->addNode(Image::class)->render($jsonArray));
    }

    public function testImageWithoutSrc()
    {
        $bb = '';

        $jsonString = <<<EOF
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph"
    },
    {
      "type": "image",
      "attrs": {
        "src": "",
        "alt": ""
      }
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())->clearNodes()->addNode(Image::class)->render($jsonArray));
    }
}
