<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a number is greater than another.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class GreaterThan extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) > $this->value;
    }
}