<?php

namespace Common\Specification\Expression;

/**
 * Represents a conjunction expression.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class AndX extends Composite
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        foreach ($this->expressions as $expression) {
            if (!$expression->evaluate($subject)) {
                return false;
            }
        }

        return true;
    }
}