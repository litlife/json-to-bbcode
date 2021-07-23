<?php

namespace Litlife\JsonToBBCode\Nodes;

class Text extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'text';
    }
}
