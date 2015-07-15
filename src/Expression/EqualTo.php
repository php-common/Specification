<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a value is equals to another after type juggling.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class EqualTo extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return $this->property->getValue($subject) == $this->value;
    }
}