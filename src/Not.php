<?php

namespace Common\Specification;

/**
 * Represents a negation specification.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class Not extends Composite
{
    /**
     * {@inheritdoc}
     */
    function createExpression(array $expressions)
    {
        return new Expression\Not($expressions);
    }
}