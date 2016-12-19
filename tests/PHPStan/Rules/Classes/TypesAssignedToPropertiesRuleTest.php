<?php declare(strict_types = 1);

namespace PHPStan\Rules\Classes;

class TypesAssignedToPropertiesRuleTest extends \PHPStan\Rules\AbstractRuleTest
{

	protected function getRule(): \PHPStan\Rules\Rule
	{
		return new TypesAssignedToPropertiesRule();
	}

	public function testTypesAssignedToProperties()
	{
		include_once __DIR__ . '/data/BarTrait.php';
		$this->analyse([__DIR__ . '/data/properties-assigned-types.php'], [
			[
				'Property PropertiesAssignedTypes\Foo::$stringProperty (string) does not accept int.',
				27,
			],
			[
				'Property PropertiesAssignedTypes\Foo::$intProperty (int) does not accept string.',
				29,
			],
			[
				'Property PropertiesAssignedTypes\Foo::$fooProperty (PropertiesAssignedTypes\Foo) does not accept PropertiesAssignedTypes\Bar.',
				31,
			],
			[
				'Static property PropertiesAssignedTypes\Foo::$staticStringProperty (string) does not accept int.',
				33,
			],
			[
				'Static property PropertiesAssignedTypes\Foo::$staticStringProperty (string) does not accept int.',
				35,
			],
			[
				'Static property PropertiesAssignedTypes\Ipsum::$parentStringProperty (string) does not accept int.',
				37,
			],
			[
				'Property PropertiesAssignedTypes\Foo::$dateTimeNotNullProperty (DateTime) does not accept null.',
				41,
			],
		]);
	}

}
