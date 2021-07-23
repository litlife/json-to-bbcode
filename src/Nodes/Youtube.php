<?php

namespace Litlife\JsonToBBCode\Nodes;

class Youtube extends Node
{
    public function matching(): bool
    {
        return $this->proseMirrorJson['type'] == 'youtube';
    }

    public function toBBCode($innerBBCode = null): string
    {
        $videoId = null;

        if (array_key_exists('attrs', $this->proseMirrorJson)) {
            $attrs = $this->proseMirrorJson['attrs'];

            if (is_array($attrs)) {
                if (array_key_exists('src', $attrs)) {
                    $src = $attrs['src'];

                    if (preg_match('/(?:http|https):\/\/www\.youtube\.com\/embed\/([A-z0-9]+)/iu', $src, $matches)) {
                        if (!empty($matches[1]))
                            $videoId = $matches[1];
                    }
                }
            }
        }

        if ($videoId) {
            return '[youtube]' . $videoId . '[/youtube]';
        }

        return '';
    }
}
