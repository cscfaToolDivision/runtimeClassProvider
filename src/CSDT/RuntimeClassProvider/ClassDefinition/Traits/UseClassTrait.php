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
namespace CSDT\RuntimeClassProvider\ClassDefinition\Traits;

use CSDT\RuntimeClassProvider\Exceptions\TypeException;
use DeepCopy\DeepCopy;

/**
 * Use class trait
 *
 * This trait define the class uses.
 *
 * @category ClassDefinition
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait UseClassTrait
{
    /**
     * Uses
     *
     * The use statement store
     *
     * @var array
     */
    private $uses = array();

    /**
     * Alias
     *
     * The alias store
     *
     * @var array
     */
    private $alias;

    /**
     * Add use
     *
     * Add a use to the store
     *
     * @param string $className The classname to store
     * @param string $alias     The classname alias to store
     *
     * @throws TypeException If the given class name or alias is not a string
     * @return UseClassTrait
     */
    public function addUse($className, $alias = null)
    {
        if (!is_string($className)) {
            throw new TypeException('string', $className);
        }

        $index = count($this->uses);
        if (!is_null($alias)) {
            if (!is_string($alias)) {
                throw new TypeException('string', $alias);
            }

            $this->alias[$index] = $alias;
        }

        $this->uses[$index] = $className;

        return $this;
    }

    /**
     * Has use
     *
     * Validate that the store contain a specified element.
     *
     * @param string $className The classname to search
     *
     * @return boolean
     */
    public function hasUse($className)
    {
        return array_search($className, $this->uses) !== false;
    }

    /**
     * Remove use
     *
     * This method remove a use statement from the store.
     *
     * @param string $className The classname to remove
     *
     * @return UseClassTrait
     */
    public function removeUse($className)
    {
        if ($this->hasUse($className)) {
            if (isset($this->alias[array_search($className, $this->uses)])) {
                unset($this->alias[array_search($className, $this->uses)]);
            }
            unset($this->uses[array_search($className, $this->uses)]);
        }

        return $this;
    }

    /**
     * Get uses
     *
     * Return the stored uses.
     *
     * @return array
     */
    public function getUses()
    {
        return $this->uses;
    }

    /**
     * Get uses by alias
     *
     * Return the uses with their alias as index if one,
     * or by integer index.
     *
     * @return array
     */
    public function getUsesByAlias()
    {
        $copier = new DeepCopy();
        $uses = $copier->copy($this->getUses());

        foreach ($this->alias as $index => $alias) {
            $uses[$alias] = $uses[$index];
            unset($uses[$index]);
        }

        return $uses;
    }
}
