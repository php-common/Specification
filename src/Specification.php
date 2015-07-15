<?php

namespace Common\Specification;

use Common\Specification\Expression\Expression;

/**
 * Represents a specification of business rules, where objects can be checked against.
 *
 * @author Marcos Passos <marcos@marcospassos.com>
 *
 * @see    http://martinfowler.com/apsupp/spec.pdf
 * @see    https://en.wikipedia.org/wiki/Specification_pattern
 */
interface Specification
{
    /**
     * Returns the subject supported by the specification.
     *
     * @return string The fully-qualified class name of the subject.
     */
    public function getSubject();

    /**
     * Checks whether a subject is satisfies the specification.
     *
     * @param object $subject The subject.
     *
     * @return boolean TRUE if the specification is satisfied by the subject, FALSE otherwise.
     */
    public function isSatisfiedBy($subject);

    /**
     * Returns the specification as expression.
     *
     * @return Expression
     */
    public function getExpression();

    /**
     * Checks whether a subject is satisfies the specification.
     *
     * Alias of {@link \Common\Specification\Specification::isSatisfiedBy}.
     *
     * @param object $subject The subject.
     *
     * @return boolean TRUE if the specification is satisfied by the subject, FALSE otherwise.
     */
    public function __invoke($subject);
}