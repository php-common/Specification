<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a value does not exists in an array.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class NotIn extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return !in_array($this->property->getValue($subject), $this->value, true);
    }
}