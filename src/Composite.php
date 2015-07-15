<?php

namespace Common\Specification;

use Common\Specification\Exception\UnexpectedTypeException;
use Common\Specification\Expression\Expression;
use InvalidArgumentException;

/**
 * Represents a composite specification.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 */
abstract class Composite extends AbstractSpecification
{
    /**
     * @var string
     */
    private $subject;

    /**
     * Constructor.
     *
     * @param Expression|Expression[] $specifications The children expressions.
     *
     * @throws UnexpectedTypeException  When the argument is not of the expected type.
     * @throws InvalidArgumentException When the specifications have mixed subjects.
     */
    public function __construct($specifications)
    {
        if (!is_array($specifications)) {
            $specifications = func_get_args();
        }

        $expressions = [];
        $subjects = [];
        foreach ($specifications as $specification) {
            if (!$specification instanceof Specification) {
                throw new UnexpectedTypeException($specification, 'Common\Specification\Specification');
            }

            $expressions[] = $specification->getExpression();
            $subjects[] = $specification->getSubject();
        }

        if (count(array_unique($subjects)) > 1) {
            throw new InvalidArgumentException(
                'The specifications subjects cannot be mixed.'
            );
        }

        $this->subject = reset($subjects);

        parent::__construct($this->createExpression($expressions));
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Creates the specification expression.
     *
     * @param array $expressions The children expressions.
     *
     * @return Expression
     */
    abstract function createExpression(array $expressions);
}