<?php

namespace Common\Specification\Expression;

use Common\Specification\Visitor\Visitor;

/**
 * Represents a comparison expression.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
abstract class Comparison implements Expression
{
    /**
     * The object property path.
     *
     * @var Property
     */
    protected $property;

    /**
     * The comparison value.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Constructor.
     *
     * @param string $property The object property path.
     * @param mixed  $value    The value to compare.
     */
    public function __construct($property, $value)
    {
        if (!$property instanceof Property) {
            $property = new Property($property);
        }

        $this->property = $property;
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function accept(Visitor $visitor)
    {
        return $visitor->visitComparison($this);
    }

    /**
     * Returns the subject property.
     *
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Returns the value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}