<?php

namespace Litlife\JsonToBBCode\Nodes;

class Table extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'table';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[table]' . $innerBBCode . '[/table]';
    }
}
