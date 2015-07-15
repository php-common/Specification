<?php

namespace Common\Specification;

use Common\Specification\Expression\Expression;
use Common\Specification\Exception\UnexpectedTypeException;

/**
 * Base implementation for specifications.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
abstract class AbstractSpecification implements Specification
{
    /**
     * @var Expression
     */
    private $expression;

    /**
     * Constructor.
     *
     * @param Expression $expression The expression.
     */
    public function __construct(Expression $expression)
    {
        $this->expression = $expression;
    }

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy($subject)
    {
        $class = $this->getSubject();

        if ($subject instanceof $class) {
            throw new UnexpectedTypeException($subject, $class);
        }

        return $this->expression->evaluate($subject);
    }

    /**
     * {@inheritdoc}
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke($subject)
    {
        return $this->isSatisfiedBy($subject);
    }
}