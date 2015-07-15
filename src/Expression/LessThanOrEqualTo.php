<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a number is less than or equals to another.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class LessThanOrEqualTo extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) <= $this->value;
    }
}