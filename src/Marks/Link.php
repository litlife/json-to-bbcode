<?php

namespace Litlife\JsonToBBCode\Marks;

class Link extends Mark
{
    private $href;

    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'link';
    }

    public function toBBCode($innerBBCode = null): string
    {
        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = $this->proseMirrorJson['attrs'];

            if (is_array($attrs)) {
                if (array_key_exists('href', $attrs))
                    $this->href = trim($attrs['href']);
            }
        }

        if (empty($innerBBCode)) {
            return '[url="' . $this->href . '"]' . $this->href . '[/url]';
        } else {
            return '[url="' . $this->href . '"]' . $innerBBCode . '[/url]';
        }
    }
}
