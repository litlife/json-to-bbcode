# ProseMirror Json to BBcode

Json-to-bbcode is a library written in PHP for converting ProseMirror json to BBCode

## Installation

Use the package manager [composer](https://getcomposer.org/) to install json-to-bbcode.

```bash
composer require litlife/json-to-bbcode
```

## Usage

In this example, you can see how to convert json to a string of bb code

```bash
use Litlife\JsonToBBCode\Renderer;

$jsonString = <<<EOT
{
  "type": "doc",
  "content": [
    {
      "type": "paragraph",
      "content": [
        {
          "type": "text",
          "text": "Example text using strong",
          "marks": [
            {
              "type": "bold"
            }
          ]
        }
      ]
    }
  ]
}
EOT;

$jsonArray = json_decode($jsonString, true);

$bbCodeString = (new Renderer())->render($jsonArray);

echo ($bbCodeString);
```
Output:

`[b]Example text using strong[/b]`

## Adding a mark
```bash
use Litlife\JsonToBBCode\Marks\Italic;

$bbCodeString = (new Renderer())->addMark(Italic::class)->render($jsonArray);
```

## Adding a node
```bash
use Litlife\JsonToBBCode\Nodes\Blockquote;

$bbCodeString = (new Renderer())->addNode(Blockquote::class)->render($jsonArray);
```

## Testing
```bash
composer test
```
## License
[MIT](https://choosealicense.com/licenses/mit/)
