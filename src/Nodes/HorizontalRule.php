<?php

namespace Litlife\JsonToBBCode\Nodes;

class HorizontalRule extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'horizontalRule';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[hr]';
    }
}
