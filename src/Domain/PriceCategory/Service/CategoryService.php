<?php


namespace App\Domain\PriceCategory\Service;

use App\Domain\PriceCategory\Specification\BronzeCategory;
use App\Domain\PriceCategory\Specification\Category;
use App\Domain\PriceCategory\Specification\GoldCategory;
use App\Domain\PriceCategory\Specification\SilverCategory;

/**
 * Class CategoryService
 * @package App\Domain\PriceCategory\Service
 */
class CategoryService
{
    /**
     * @var Category[]
     */
    private array $categories;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->categories = [
            new BronzeCategory(),
            new SilverCategory(),
            new GoldCategory()
        ];
    }

    /**
     * @param int $age
     * @param int $seniority
     * @param bool $guarantor
     * @return Category|null
     */
    public function getCategory(int $age, int $seniority, bool $guarantor = false): ?Category
    {
        foreach ($this->categories as $category) {
            if ($category->isValid($age, $seniority, $guarantor)) {
                return $category;
            }
        }

        return null;
    }
}
