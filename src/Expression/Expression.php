<?php

namespace Common\Specification\Expression;

use Common\Specification\Visitor\Visitor;

/**
 * Represents a expression.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
interface Expression
{
    /**
     * Evaluates an object against the expression.
     *
     * @param object $subject The evaluation subject.
     *
     * @return boolean
     */
    public function evaluate($subject);

    /**
     * Forwards the call to the appropriate method of the given visitor
     * and returns the result.
     *
     * @param Visitor $visitor The visitor.
     *
     * @return mixed
     */
    public function accept(Visitor $visitor);
}