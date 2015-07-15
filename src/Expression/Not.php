<?php

namespace Common\Specification\Expression;

/**
 * Represents a negation expression.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class Not extends AndX
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($subject)
    {
        return !parent::evaluate($subject);
    }
}