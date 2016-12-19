<?php

namespace PHPStan\Rules\Classes;

trait BarTrait {

	/** @var \DateTime */
	protected $dateTimeNotNullProperty;

	/** @var \DateTime|null */
	protected $dateTimeNullProperty;
}
