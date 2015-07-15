<?php

namespace Common\Specification;

/**
 * Represents a conjunction specification.
 *
 * @author Marcos Passos <marcos@croct.com>
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