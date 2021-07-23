<?php

namespace Litlife\JsonToBBCode\Marks;

class Superscript extends Mark
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'superscript';
    }

    public function toBBCode($innerBBCode = null): string
    {
        return '[sup]' . $innerBBCode . '[/sup]';
    }
}
