<?php

namespace Litlife\JsonToBBCode\Nodes;

class BulletList extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'bulletList';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[ul]' . $innerBBCode . '[/ul]';
    }
}
