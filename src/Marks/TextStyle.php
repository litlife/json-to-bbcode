<?php

namespace Litlife\JsonToBBCode\Marks;

class TextStyle extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'textStyle';
    }

    public function toBBCode($innerBBCode = null): string
    {
        $bb = $innerBBCode;

        if ($this->proseMirrorJson['type'] == 'textStyle') {
            $attrs = $this->proseMirrorJson['attrs'];

            foreach ($attrs as $name => $value) {
                if (array_key_exists($name, $attrs)) {
                    switch ($name) {
                        case 'fontFamily':
                            $bb = '[font="' . $value . '"]' . $bb . '[/font]';
                            break;
                        case 'fontColor':
                            $bb = '[color=' . $value . ']' . $bb . '[/color]';
                            break;
                    }
                }
            }
        }

        return $bb;
    }
}
