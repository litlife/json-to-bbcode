<?php

namespace Litlife\JsonToBBCode\Nodes;

class Paragraph extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'paragraph';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return $innerBBCode . "\r\n";
    }
}
