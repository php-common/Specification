<?php

namespace Common\Specification\Expression;

/**
 * Represents a disjunction expression.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class OrX extends Composite
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        foreach ($this->expressions as $expression) {
            if ($expression->evaluate($subject)) {
                return true;
            }
        }

        return false;
    }
}