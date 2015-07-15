<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a value is not equals to another after type juggling.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class NotEqualTo extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) != $this->value;
    }
}