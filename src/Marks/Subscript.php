<?php

namespace Litlife\JsonToBBCode\Marks;

class Subscript extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'subscript';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[sub]' . $innerBBCode . '[/sub]';
    }
}
