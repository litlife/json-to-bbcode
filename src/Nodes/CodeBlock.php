<?php

namespace Litlife\JsonToBBCode\Nodes;

class CodeBlock extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'codeBlock';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[code]' . $innerBBCode . '[/code]';
    }
}
