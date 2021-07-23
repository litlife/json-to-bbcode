<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Subscript;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class SubscriptTest extends TestCase
{
    public function test()
    {
        $bb = '[sub]test[/sub]';

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
              "type": "subscript"
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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->addMark(Subscript::class)->render($jsonArray));
    }
}
