<?php

namespace Common\Specification\Exception;

/**
 * Represents a type mismatch exception.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class UnexpectedTypeException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param mixed $value         The given value.
     * @param string $expectedType The expected type.
     */
    public function __construct($value, $expectedType)
    {
        parent::__construct(sprintf(
            'Expected argument of type %s, %s given.',
            $expectedType,
            is_object($value) ? get_class($value) : gettype($value)
        ));
    }
}