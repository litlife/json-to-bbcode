<?php

namespace Litlife\JsonToBBCode\Nodes;

class Image extends Node
{
    private $width;
    private $height;
    private string $src;

    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'image';
    }

    public function toBBCode($innerBBCode = null): string
    {
        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = $this->proseMirrorJson['attrs'];

            if (is_array($attrs)) {
                if (array_key_exists('width', $attrs))
                    $this->width = intval($attrs['width']);

                if (array_key_exists('height', $attrs))
                    $this->height = intval($attrs['height']);

                if (array_key_exists('src', $attrs))
                    $this->src = trim($attrs['src']);
            }
        }

        if ($this->src) {
            if ($this->width && $this->height)
                return '[img=' . $this->width . 'x' . $this->height . ']' . $this->src . '[/img]';
            else
                return '[img]' . $this->src . '[/img]';
        }

        return '';
    }
}
