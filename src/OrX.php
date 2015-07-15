<?php

namespace Common\Specification;

/**
 * Represents a disjunction specification.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class OrX extends Composite
{
    /**
     * {@inheritdoc}
     */
    function createExpression(array $expressions)
    {
        return new Expression\OrX($expressions);
    }
}