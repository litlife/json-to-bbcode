<?php

namespace Litlife\JsonToBBCode;

class Renderer
{
    protected $marks = [
        Marks\Bold::class,
        Marks\Italic::class,
        Marks\Strike::class,
    ];

    protected $nodes = [
        Nodes\Doc::class,
        Nodes\Paragraph::class,
        Nodes\Text::class,
        Nodes\Blockquote::class,
        Nodes\Image::class,
    ];

    protected $attrs = [
        Attrs\TextAlign::class
    ];

    public function withMarks($marks = null): Renderer
    {
        if (is_array($marks)) {
            $this->marks = $marks;
        }

        return $this;
    }

    public function withNodes($nodes = null): Renderer
    {
        if (is_array($nodes)) {
            $this->nodes = $nodes;
        }

        return $this;
    }

    public function addNodes($nodes): Renderer
    {
        foreach ($nodes as $node) {
            $this->addNode($node);
        }

        return $this;
    }

    public function addNode(string $node): Renderer
    {
        $this->nodes[] = $node;

        return $this;
    }

    public function clearNodes(): Renderer
    {
        $this->nodes = [];

        return $this;
    }

    public function clearMarks(): Renderer
    {
        $this->marks = [];

        return $this;
    }

    public function clearAttrs(): Renderer
    {
        $this->attrs = [];

        return $this;
    }

    public function addAttr(string $attr): Renderer
    {
        $this->attrs[] = $attr;

        return $this;
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }

    public function getMarks(): array
    {
        return $this->marks;
    }

    public function addMarks($marks): Renderer
    {
        foreach ($marks as $mark) {
            $this->addMark($mark);
        }

        return $this;
    }

    public function addMark($mark): Renderer
    {
        $this->marks[] = $mark;

        return $this;
    }

    public function replaceNode($search_node, $replace_node): Renderer
    {
        foreach ($this->nodes as $key => $node_class) {
            if ($node_class == $search_node) {
                $this->nodes[$key] = $replace_node;
            }
        }

        return $this;
    }

    public function replaceMark($search_mark, $replace_mark): Renderer
    {
        foreach ($this->marks as $key => $mark_class) {
            if ($mark_class == $search_mark) {
                $this->marks[$key] = $replace_mark;
            }
        }

        return $this;
    }

    public function render(array $json): string
    {
        return $this->renderTag($json);
    }

    private function renderTag(array $json): string
    {
        $bb = '';

        if (array_key_exists('text', $json)) {
            $bb .= $json['text'];
        } else if (array_key_exists('content', $json)) {
            foreach ($json['content'] as $mark) {
                $bb .= $this->renderTag($mark);
            }
        }

        if (array_key_exists('attrs', $json)) {
            $attrs = array_reverse($json['attrs']);

            foreach ($attrs as $attr) {

                $attribute = $this->getMatchingAttr($json);

                if ($attribute) {
                    $bb = $attribute->toBBCode($bb);
                }
            }
        }

        $node = $this->getMatchingNode($json);

        if ($node) {
            $bb = $node->toBBCode($bb);
        }

        if (array_key_exists('marks', $json)) {
            $marks = array_reverse($json['marks']);

            foreach ($marks as $mark) {

                $mark = $this->getMatchingMark($mark);

                if ($mark) {
                    $bb = $mark->toBBCode($bb);
                }
            }
        }

        return $bb;
    }

    private function getMatchingAttr(array $item)
    {
        return $this->getMatchingClass($item, $this->attrs);
    }

    private function getMatchingClass(array $node, array $classes)
    {
        foreach ($classes as $class) {
            $instance = new $class($node);

            if ($instance->matching()) {
                return $instance;
            }
        }

        return false;
    }

    private function getMatchingNode($item)
    {
        return $this->getMatchingClass($item, $this->nodes);
    }

    private function getMatchingMark(array $item)
    {
        return $this->getMatchingClass($item, $this->marks);
    }
}
