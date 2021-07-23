<?php

namespace Litlife\JsonToBBCode\Nodes;

class TableHeader extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'tableHeader';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[th]' . $innerBBCode . '[/th]';
    }
}
