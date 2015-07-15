<?php

namespace Common\Specification\Visitor;

use Common\Specification\Expression\Comparison;
use Common\Specification\Expression\Composite;
use Common\Specification\Expression\Expression;

/**
 * Represents an expression graph walker/traverser.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
interface Visitor
{
    /**
     * Dispatches walking an expression to the appropriate handler.
     *
     * @param Expression $expression The expression.
     *
     * @return mixed
     */
    public function dispatch(Expression $expression);

    /**
     * Visits a composite expression.
     *
     * @param Composite $composite The expression.
     *
     * @return mixed
     */
    public function visitComposite(Composite $composite);

    /**
     * Visits a comparison expression.
     *
     * @param Comparison $comparison The expression.
     *
     * @return mixed
     */
    public function visitComparison(Comparison $comparison);
}