<?php

namespace Litlife\JsonToBBCode\Nodes;

class Node
{
    public array $proseMirrorJson;

    public function __construct(array $node)
    {
        $this->proseMirrorJson = $node;
    }

    public function matching(): bool
    {
        return false;
    }

    public function toBBCode($innerBBCode = null): string
    {
        return $innerBBCode;
    }
}
