<?php

namespace Litlife\JsonToBBCode\Nodes;

class HardBreak extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'hardBreak';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return "\r\n";
    }
}
