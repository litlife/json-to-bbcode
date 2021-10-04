<?php

namespace Litlife\JsonToBBCode\Nodes;

class Smile extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'smile';
    }

    public function toBBCode($innerBBCode = null): string
    {
        if (!empty($this->proseMirrorJson['attrs']['simple_form']))
            return $this->proseMirrorJson['attrs']['simple_form'];
        else
            return '';
    }
}
