<?php

namespace Litlife\JsonToBBCode\Attrs;

class TextAlign extends Attr
{
    public $align;
    public $defaultAlign = 'left';
    public $alignTypesArray = ['left', 'right', 'center', 'justify'];

    public function matching(): bool
    {
        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = array_reverse($this->proseMirrorJson['attrs']);

            if (array_key_exists('textAlign', $attrs)) {
                if (in_array($attrs['textAlign'], $this->alignTypesArray))
                    return true;
            }
        }

        return false;
    }

    public function toBBCode($innerBBCode = null): string
    {
        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = array_reverse($this->proseMirrorJson['attrs']);

            if (array_key_exists('textAlign', $attrs)) {
                $align = $attrs['textAlign'];

                if (in_array($align, $this->alignTypesArray))
                    $this->align = $align;
            }
        }

        if ($this->align == $this->defaultAlign)
        {
            return $innerBBCode;
        }
        else
        {
            switch ($this->align) {
                case 'left':
                    $innerBBCode = '[left]' . $innerBBCode . '[/left]';
                    break;
                case 'right':
                    $innerBBCode = '[right]' . $innerBBCode . '[/right]';
                    break;
                case 'center':
                    $innerBBCode = '[center]' . $innerBBCode . '[/center]';
                    break;
                case 'justify':
                    $innerBBCode = '[justify]' . $innerBBCode . '[/justify]';
                    break;
            }
        }

        return $innerBBCode;
    }
}
