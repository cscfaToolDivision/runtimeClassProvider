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

use CSDT\RuntimeClassProvider\ClassDefinition\Traits\UseClassTrait;

/**
 * Class definition
 *
 * This class store a class definition
 *
 * @category ClassDefinition
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ClassDefinition
{
    use UseClassTrait;

    /**
     * Class name
     *
     * This property store the class name definition.
     *
     * @var string
     */
    private $className;

    /**
     * Namespace
     *
     * This property store the class namespace definition.
     *
     * @var string
     */
    private $namespace;

    private $implements;

    private $extends;

    private $traits;

    private $funcions;
}
