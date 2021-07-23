<?php

namespace Litlife\JsonToBBCode\Nodes;

class Blockquote extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'blockquote';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[quote]' . $innerBBCode . '[/quote]';
    }
}
