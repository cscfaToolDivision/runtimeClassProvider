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
namespace CSDT\RuntimeClassProvider\Tests\ClassDefinition\Traits;

use CSDT\PhpunitTestHelper\TestCases\ObjectTestCase;
use CSDT\RuntimeClassProvider\Tests\ClassDefinition\Traits\Misc\UseClassObject;
use CSDT\RuntimeClassProvider\Exceptions\TypeException;

/**
 * UseClassTrait test
 *
 * This class is used to validate a UseClassTrait logic.
 *
 * @category Test
 * @package  RuntimeClassProvider
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UseClassTraitTest extends ObjectTestCase
{

    /**
     * Instance
     *
     * This property store the tested instance.
     *
     * @var UseClassObject
     */
    private $instance;

    /**
     * {@inheritDoc}
     *
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->instance = new UseClassObject();
    }

    /**
     * Test method
     *
     * This method validate the trait methods.
     *
     * @return            void
     */
    public function testMethods()
    {
        $this->newSetterCall()
            ->call('addUse')
            ->onInstance($this->instance)
            ->with(array(\stdClass::class))
            ->mustReturn($this->instance, true)
            ->inject(array(\stdClass::class))
            ->injectIn('uses')
            ->resolve();

        $this->newObjectCall()
            ->call('hasUse')
            ->onInstance($this->instance)
            ->mustReturn(true)
            ->with(array(\stdClass::class))
            ->resolve();

        $this->newObjectCall()
            ->call('getUses')
            ->onInstance($this->instance)
            ->mustReturn(array(\stdClass::class))
            ->resolve();

        $this->newSetterCall()
            ->call('removeUse')
            ->onInstance($this->instance)
            ->with(array(\stdClass::class))
            ->mustReturn($this->instance, true)
            ->inject(array())
            ->injectIn('uses')
            ->resolve();

        $this->newObjectCall()
            ->call('hasUse')
            ->onInstance($this->instance)
            ->mustReturn(false)
            ->with(array(\stdClass::class))
            ->resolve();

        $this->newObjectCall()
            ->call('getUses')
            ->onInstance($this->instance)
            ->mustReturn(array())
            ->resolve();

        $this->newSetterCall()
            ->call('addUse')
            ->onInstance($this->instance)
            ->with(array(\stdClass::class, 'std'))
            ->mustReturn($this->instance, true)
            ->inject(array(\stdClass::class))
            ->injectIn('uses')
            ->inject(array('std'))
            ->injectIn('alias')
            ->resolve();

        $this->newObjectCall()
            ->call('getUsesByAlias')
            ->onInstance($this->instance)
            ->mustReturn(array('std' => \stdClass::class))
            ->resolve();

        $this->newObjectCall()
            ->call('addUse')
            ->onInstance($this->instance)
            ->with(array(new \stdClass()))
            ->mustThrow(TypeException::class)
            ->resolve();
    }
}
