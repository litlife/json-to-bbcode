<?php

namespace Litlife\JsonToBBCode\Tests\Marks;

use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class UnknownMarkTest extends TestCase
{
    public function test()
    {
        $bb = 'test';

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
              "type": "unknown"
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

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->clearMarks()
            ->render($jsonArray)
        );
    }
}
