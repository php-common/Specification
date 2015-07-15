<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a value exists in an array.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class In extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return in_array($this->property->getValue($subject), $this->value, true);
    }
}