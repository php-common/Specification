<?php

namespace Common\Specification\Expression;

use Common\Specification\Exception\UnexpectedTypeException;
use Common\Specification\Visitor\Visitor;

/**
 * Represents a composite specification.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
abstract class Composite implements Expression
{
    /**
     * @var Expression[]
     */
    protected $expressions;

    /**
     * Constructor.
     *
     * @param Expression|Expression[] $expressions The children expression(s).
     *
     * @throws UnexpectedTypeException  When the argument is not of the expected type.
     */
    public function __construct($expressions)
    {
        if (!is_array($expressions)) {
            $expressions = func_get_args();
        }

        foreach ($expressions as $expression) {
            if (!$expression instanceof Expression) {
                throw new UnexpectedTypeException($expression, 'Common\Specification\Expression\Expression');
            }
        }

        $this->expressions = $expressions;
    }

    /**
     * {@inheritdoc}
     */
    public function accept(Visitor $visitor)
    {
        return $visitor->visitComposite($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getExpressions()
    {
        return $this->expressions;
    }
}