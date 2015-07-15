<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a value is not identical to another.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class NotIdenticalTo extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) !== $this->value;
    }
}