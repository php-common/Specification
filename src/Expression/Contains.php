<?php

namespace Common\Specification\Expression;

/**
 * Evaluates if a string contains a substring.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class Contains extends Comparison
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return false !== strpos($this->property->getValue($subject), $this->value);
    }
}