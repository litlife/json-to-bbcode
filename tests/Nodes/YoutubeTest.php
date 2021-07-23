<?php

use Litlife\JsonToBBCode\Nodes\Youtube;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class YoutubeTest extends TestCase
{
    public function test()
    {
        $bb = '[youtube]6x7Ktc94rIA[/youtube]';

        $jsonString = <<<EOF
         {
  "type": "doc",
  "content": [
    {
      "type": "youtube",
      "attrs": {
        "src": "https://www.youtube.com/embed/6x7Ktc94rIA",
        "width": 560,
        "height": 315,
        "allowfullscreen": 0,
        "title": "YouTube video player",
        "frameborder": 0,
        "allow": "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      }
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(Youtube::class)
            ->render($jsonArray));
    }
}
