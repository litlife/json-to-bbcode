<?php

namespace Litlife\JsonToBBCode\Attrs;

class Attr
{
    public $proseMirrorJson;

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
