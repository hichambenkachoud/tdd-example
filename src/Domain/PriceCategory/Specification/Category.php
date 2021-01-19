<?php

namespace App\Domain\PriceCategory\Specification;

/**
 * Class Category
 * @package App\Domain\PriceCategory\Category
 */
abstract class Category
{
    public abstract function isValid(int $age, int $seniority = 0, bool $guarantor = false): bool;
}
