<?php

namespace App\Domain\PriceCategory\UseCase;

use App\Domain\PriceCategory\Service\CategoryService;

/**
 * Class GetPriceCategory
 * @package App\Domain\PriceCategory\UseCase
 */
class GetPriceCategory
{
    /**
     * @var CategoryService
     */
    private CategoryService $categoryService;

    /**
     * GetPriceCategory constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @param int $age
     * @param int $seniority
     * @param bool $hasGuarantor
     * @return null|string
     */
    public function execute(int $age, int $seniority = 0, bool $hasGuarantor = false): ?string
    {
        $category = $this->categoryService->getCategory($age, $seniority, $hasGuarantor);
        return $category !== null ? $category::NAME : null;
    }


}
