# runtimeClassProvider
This repository store a PHP library that allow to create class at Runtime

## UseClassTrait

This trait define the logic to store and manage a set of class use statement.

```php
$traitInstance = new InstanceWithTrait();

$traitInstance->addUse(AnyClass::class);
$traitInstance->hasUse(AnyClass::class);
$traitInstance->removeUse(AnyClass::class);
$traitInstance->getUses();
``` 

Note: the uses are uniques 

#### The addUse

This method store a new Use statement into the class. This use statement MUST be a string. A TypeException will be throwed if a non string is provided.

#### The hasUse

This method validate that a given string class name is already stored.

#### The removeUse

This method allow to remove a use statement from the store.

#### The getUses

This method return the stored uses as array.

## ImplementDefinition

This class allow to store a class definition implementation.

```php
$implementationDef = new ImplementDefinition($classDefinition);

$implementationDef->addImplementation('MyClass', MyClass::class);
$implementationDef->addImplementation('Other', MyOtherClass::class, 'Other');

if($implementationDef->hasImplementation('Other')){
	$implementationDef->removeImplementation('Other');
}

$implementationDef->getImplementations(); // ['MyClass']
```

#### The addImplementation

This method allow to store a new implementation and register the namespace use and alias to be use in the class definition.

#### The hasImplementation

Validate that the current instance store an implementation class name.

#### The removeImplementation

This method allow to remove a class implementation. Not the use is not removed to avoid class missing uses.

#### The getImplementations

This method return the current class implementations.
