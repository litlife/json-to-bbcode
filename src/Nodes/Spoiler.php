<?php

namespace Litlife\JsonToBBCode\Nodes;

class Spoiler extends Node
{
    private string $title = '';

    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'spoiler';
    }

    public function toBBCode($innerBBCode = null): string
    {
        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = $this->proseMirrorJson['attrs'];

            if (is_array($attrs)) {
                if (array_key_exists('title', $attrs)) {
                    $this->title = trim($attrs['title']);
                }
            }
        }

        if ($this->title !== '') {
            return '[spoiler="' . $this->title . '"]' . $innerBBCode . '[/spoiler]';
        } else {
            return '[spoiler]' . $innerBBCode . '[/spoiler]';
        }
    }
}
