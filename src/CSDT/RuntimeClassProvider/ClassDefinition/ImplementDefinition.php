<?php
/**
 * This file is part of the Hephaistos project management API.
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category ClassDefinition
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\RuntimeClassProvider\ClassDefinition;

use CSDT\PhpunitTestHelper\Exceptions\TypeException;

/**
 * Implement definition
 *
 * This class store an implementation definition
 *
 * @category ClassDefinition
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ImplementDefinition
{
    /**
     * Class definition
     *
     * This property store the class that the
     * current instance store the implementations.
     *
     * @var ClassDefinition
     */
    private $classDefinition;

    /**
     * Implementations
     *
     * The class implementations.
     *
     * @var array
     */
    private $implementations = array();

    /**
     * Constructor
     *
     * The ImplementDefinition constructor.
     *
     * @param ClassDefinition $classDefinition The class definition that the current instance
     *                                         store the implementations.
     *
     * @return void
     */
    public function __construct(ClassDefinition $classDefinition)
    {
        $this->implementations = array();
        $this->classDefinition = $classDefinition;
    }

    /**
     * Add implementation
     *
     * This method allow to store a new implementation.
     *
     * @param string $className The implementation class name
     * @param string $namespace The implementation class namespace
     * @param string $alias     [Optional] The implementation use alias
     *
     * @throws TypeException If the classname, the namespace or the alias are not string
     * @return $this
     */
    public function addImplementation($className, $namespace, $alias = null)
    {
        if (!is_string($className)) {
            throw new TypeException('string', $className);
        }
        if (!is_string($namespace)) {
            throw new TypeException('string', $namespace);
        }

        $this->classDefinition->addUse($namespace, $alias);

        array_push($this->implementations, $className);

        $this->implementations = array_unique($this->implementations);

        return $this;
    }

    /**
     * Has implementation
     *
     * Validate that the current instance store an implementation class name.
     *
     * @param string $className The implementation class name
     * @return boolean
     */
    public function hasImplementation($className)
    {
        return boolval(array_search($className, $this->implementations));
    }

    /**
     * Remove implementation
     *
     * This method allow to remove a class implementation. Note the use
     * is not removed.
     *
     * @param string $className The class name to remove
     *
     * @return $this
     */
    public function removeImplementation($className)
    {
        if ($this->hasImplementation($className)) {
            unset($this->implementations[array_search($className, $this->implementations)]);
        }

        return $this;
    }

    /**
     * Get implementations
     *
     * This method return the current implementations.
     *
     * @return array
     */
    public function getImplementations()
    {
        return $this->implementations;
    }
}
