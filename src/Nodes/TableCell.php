<?php

namespace Litlife\JsonToBBCode\Nodes;

class TableCell extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'tableCell';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[td]' . $innerBBCode . '[/td]';
    }
}
