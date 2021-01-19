<?php


namespace App\Domain\PriceCategory\Specification;

/**
 * Class BronzeCategory
 * @package App\Domain\PriceCategory\Specification
 */
class BronzeCategory extends Category
{
    public const NAME = "bronze";

    /**
     * @param int $age
     * @param int $seniority
     * @param bool $guarantor
     * @return bool
     */
    public function isValid(int $age, int $seniority = 0, bool $guarantor = false): bool
    {
        return $age < 18 && $guarantor;
    }
}
