<?php

namespace Litlife\JsonToBBCode\Nodes;

class TableRow extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'tableRow';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[tr]' . $innerBBCode . '[/tr]';
    }
}
