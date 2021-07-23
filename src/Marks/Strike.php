<?php

namespace Litlife\JsonToBBCode\Marks;

class Strike extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'strike';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[s]' . $innerBBCode . '[/s]';
    }
}
