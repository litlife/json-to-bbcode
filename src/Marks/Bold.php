<?php

namespace Litlife\JsonToBBCode\Marks;

class Bold extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'bold';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[b]' . $innerBBCode . '[/b]';
    }
}
