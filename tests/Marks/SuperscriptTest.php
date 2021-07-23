<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Marks\Superscript;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class SuperscriptTest extends TestCase
{
    public function test()
    {
        $bb = '[sup]test[/sup]';

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
              "type": "superscript"
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

        $this->assertEquals($bb, (new Renderer())->clearMarks()->clearNodes()->addMark(Superscript::class)->render($jsonArray));
    }
}
