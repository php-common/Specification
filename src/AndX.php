<?php

namespace Common\Specification;

/**
 * Represents a conjunction specification.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
class AndX extends Composite
{
    /**
     * {@inheritdoc}
     */
    function createExpression(array $expressions)
    {
        return new Expression\AndX($expressions);
    }
}