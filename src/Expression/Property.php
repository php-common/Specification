<?php

namespace Common\Specification\Expression;
use Common\Specification\Exception\UnexpectedTypeException;

/**
 * Represents an object property.
 *
 * @author Marcos Passos <marcos@croct.com>
 */
class Property
{
    /**
     * The property path.
     *
     * @var string
     */
    private $property;

    /**
     * Constructor.
     *
     * @param string $property The property path in dot notation.
     */
    public function __construct($property)
    {
        $this->property = (string) $property;
    }

    /**
     * Returns the value at the end of the property path of the object graph.
     *
     * @param object $subject The object to read.
     *
     * @return mixed
     *
     * @throws UnexpectedTypeException  When the argument is not of the expected type.
     */
    public function getValue($subject)
    {
        if (!is_object($subject)) {
            throw new UnexpectedTypeException($subject, 'object');
        }

        return $this->readValue($subject, $this->property);
    }

    /**
     * Returns the property path in dot notation.
     *
     * @return array
     */
    public function getPath()
    {
        return $this->property;
    }

    /**
     * Reads a property from an object.
     *
     * @param object $object   The object to read.
     * @param string $property The property path in dot notation.
     *
     * @return mixed
     */
    private function readValue($object, $property)
    {
        if (strpos($property, '.') !== false) {
            $elements = explode('.', $property, 2);
            $object = $this->readValue($object, $elements[0]);

            return $this->readValue($object, $elements[1]);
        }

        if (is_array($object)) {
            return $object[$property];
        }

        $accessors = array('get', 'is');

        foreach ($accessors as $accessor) {
            $accessor .= $property;

            if (!method_exists($object, $accessor)) {
                continue;
            }

            return $object->$accessor();
        }

        // __call should be triggered for get.
        $accessor = $accessors[0] . $property;

        if (method_exists($object, '__call')) {
            return $object->$accessor();
        }

        return $object->$property;
    }

    /**
     * Returns the property path.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->property;
    }
}