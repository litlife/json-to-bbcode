<?php

namespace Litlife\JsonToBBCode\Nodes;

class Doc extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'doc';
    }
}
