<?php
/**
 * This file is part of the Hephaistos project management API.
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 5.6
 *
 * @category Test
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\RuntimeClassProvider\Tests\ClassDefinition\Traits\Misc;

use CSDT\RuntimeClassProvider\ClassDefinition\Traits\UseClassTrait;

/**
 * UseClassObject
 *
 * This object is used to validate a UseClassTrait logic.
 *
 * @category Test
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UseClassObject
{
    use UseClassTrait;
}
