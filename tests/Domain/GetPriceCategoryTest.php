<?php

namespace App\Tests\Domain;

use App\Domain\PriceCategory\Service\CategoryService;
use App\Domain\PriceCategory\UseCase\GetPriceCategory;
use PHPUnit\Framework\TestCase;

/**
 * Class GetPriceCategory
 * @package App\Tests\Domain
 */
class GetPriceCategoryTest extends TestCase
{
    /**
     * @var GetPriceCategory
     */
    private GetPriceCategory $useCase;

    protected function setUp(): void
    {
       $this->useCase = new GetPriceCategory(new CategoryService());
    }

    /**
     * check if member is under 18 and has a guarantor
     * @test
     */
    public function test_if_a_member_has_less_than_18_years_old_and_has_a_guarantor()
    {
        $this->assertEquals("bronze", $this->useCase->execute(10, 0, true));
    }

    /**
     * check if member is under 18 and doesn't have a guarantor
     * @test
     */
    public function test_if_a_member_has_less_than_18_years_old_and_does_not_has_a_guarantor()
    {
        $this->assertEquals(null, $this->useCase->execute(15, 0, false));
    }

    /**
     * check if member is above 18 and has less than 2 years of seniority
     * @test
     */
    public function test_if_a_member_has_more_than_18_years_old_and_has_less_than_2_years_of_seniority()
    {
        $this->assertEquals("silver", $this->useCase->execute(20, 1));
    }

    /**
     * check if member is above 18 and has more than 2 years of seniority
     * @test
     */
    public function test_if_a_member_has_more_than_18_years_old_and_has_more_than_2_years_of_seniority()
    {
        $this->assertEquals("gold", $this->useCase->execute(25, 5));
    }


}
