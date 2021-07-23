<?php

namespace Litlife\JsonToBBCode\Marks;

class Italic extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'italic';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[i]' . $innerBBCode . '[/i]';
    }
}
