<?php

use Litlife\JsonToBBCode\Nodes\ListItem;
use Litlife\JsonToBBCode\Nodes\OrderList;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class OrderListTest extends TestCase
{
    public function test()
    {
        $bb = '[ol][li]1[/li][li]2[/li][/ol]';

        $jsonString = <<<EOF
 {
  "type": "doc",
  "content": [
    {
      "type": "orderedList",
      "attrs": {
        "start": 1
      },
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
            ->addNode(OrderList::class)
            ->addNode(ListItem::class)
            ->render($jsonArray));
    }
}
