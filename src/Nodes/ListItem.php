<?php

namespace Litlife\JsonToBBCode\Nodes;

class ListItem extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'listItem';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[li]' . $innerBBCode . '[/li]';
    }
}
