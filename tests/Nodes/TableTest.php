<?php

namespace Litlife\JsonToBBCode\Tests\Nodes;

use Litlife\JsonToBBCode\Nodes\Table;
use Litlife\JsonToBBCode\Nodes\TableCell;
use Litlife\JsonToBBCode\Nodes\TableHeader;
use Litlife\JsonToBBCode\Nodes\TableRow;
use Litlife\JsonToBBCode\Renderer;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    public function test()
    {
        $bb = '[table][tr][td]1[/td][td]2[/td][/tr][/table]';

        $jsonString = <<<EOF
 {
  "type": "doc",
  "content": [
    {
      "type": "table",
      "content": [
        {
          "type": "tableRow",
          "content": [
            {
              "type": "tableCell",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
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
              "type": "tableCell",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
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
  ]
}
EOF;

        $jsonArray = json_decode($jsonString, true);

        $this->assertEquals($bb, (new Renderer)
            ->clearNodes()
            ->addNode(Table::class)
            ->addNode(TableRow::class)
            ->addNode(TableCell::class)
            ->render($jsonArray)
        );
    }

    public function testHeader()
    {
        $bb = '[table][tr][th]1[/th][th]2[/th][/tr][tr][td]3[/td][td]4[/td][/tr][/table]';

        $jsonString = <<<EOF
          {
  "type": "doc",
  "content": [
    {
      "type": "table",
      "content": [
        {
          "type": "tableRow",
          "content": [
            {
              "type": "tableHeader",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
              "content": [
                {
                  "type": "paragraph",
                  "attrs": {
                    "textAlign": "left"
                  },
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
              "type": "tableHeader",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
              "content": [
                {
                  "type": "paragraph",
                  "attrs": {
                    "textAlign": "left"
                  },
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
        },
        {
          "type": "tableRow",
          "content": [
            {
              "type": "tableCell",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
              "content": [
                {
                  "type": "paragraph",
                  "attrs": {
                    "textAlign": "left"
                  },
                  "content": [
                    {
                      "type": "text",
                      "text": "3"
                    }
                  ]
                }
              ]
            },
            {
              "type": "tableCell",
              "attrs": {
                "colspan": 1,
                "rowspan": 1,
                "colwidth": null
              },
              "content": [
                {
                  "type": "paragraph",
                  "attrs": {
                    "textAlign": "left"
                  },
                  "content": [
                    {
                      "type": "text",
                      "text": "4"
                    }
                  ]
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

        $this->assertEquals($bb, (new Renderer)
            ->clearNodes()
            ->clearMarks()
            ->clearAttrs()
            ->addNode(Table::class)
            ->addNode(TableHeader::class)
            ->addNode(TableRow::class)
            ->addNode(TableCell::class)
            ->render($jsonArray)
        );
    }
}
