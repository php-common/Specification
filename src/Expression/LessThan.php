<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a number is less than another.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class LessThan extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) < $this->value;
    }
}