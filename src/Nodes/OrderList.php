<?php

namespace Litlife\JsonToBBCode\Nodes;

class OrderList extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'orderedList';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[ol]' . $innerBBCode . '[/ol]';
    }
}
