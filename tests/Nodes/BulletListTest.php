<?php

use Litlife\JsonToBBCode\Nodes\BulletList;
use Litlife\JsonToBBCode\Nodes\ListItem;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class BulletListTest extends TestCase
{
    public function test()
    {
        $bb = '[ul][li]1[/li][li]2[/li][/ul]';

        $jsonString = <<<EOF
   {
  "type": "doc",
  "content": [
    {
      "type": "bulletList",
      "content": [
        {
          "type": "listItem",
          "content": [
            {
              "type": "paragraph",
              "content": [
                {
                  "type": "text",
                  "text": "1"
                }
              ]
            }
          ]
        },
        {
          "type": "listItem",
          "content": [
            {
              "type": "paragraph",
              "content": [
                {
                  "type": "text",
                  "text": "2"
                }
              ]
            }
          ]
        }
      ]
    }
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer())
            ->clearNodes()
            ->addNode(BulletList::class)
            ->addNode(ListItem::class)
            ->render($jsonArray));
    }
}
