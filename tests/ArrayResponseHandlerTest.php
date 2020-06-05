<?php

namespace EcomDev\AwesomeLayeredNavigation;

use EcomDev\AwesomeLayeredNavigation\Api\ResponseHandler;
use PHPUnit\Framework\TestCase;

class ArrayResponseHandlerTest extends TestCase
{
    /** @var ArrayResponseHandler */
    private $responseHandler;

    protected function setUp(): void
    {
        $this->responseHandler = new ArrayResponseHandler();
    }

    /** @test */
    public function whenNoRenderHappenedReturnsNothing()
    {
        $this->assertEquals([], $this->responseHandler->toArray());
    }

    /** @test */
    public function rendersTotalRecordsCount() {
        $this->responseHandler->renderTotal(100);

        $this->assertEquals(['total' => 100], $this->responseHandler->toArray());
    }

    /** @test */
    public function rendersFacetOfTypeOption() {
        $this->responseHandler->renderFacet('color',ResponseHandler::FACET_OPTION, [1 => 100, 2 => 20]);
        $this->responseHandler->renderFacet('size', ResponseHandler::FACET_OPTION, [10 => 50, 20 => 50]);

        $this->assertEquals(
            [
                'facets' => [
                    'color' => [
                        'type' => ResponseHandler::FACET_OPTION,
                        'data' => [1 => 100, 2 => 20]
                    ],
                    'size' => [
                        'type' => ResponseHandler::FACET_OPTION,
                        'data' => [10 => 50, 20 => 50]
                    ]
                ]
            ],
            $this->responseHandler->toArray()
        );
    }

    /** @test */
    public function rendersFacetOfRangeType()
    {
        $this->responseHandler->renderFacet('price', ResponseHandler::FACET_RANGE, [10, 200]);
        $this->responseHandler->renderFacet('discount', ResponseHandler::FACET_RANGE, [5, 20]);

        $this->assertEquals(
            [
                'facets' => [
                    'price' => [
                        'type' => ResponseHandler::FACET_RANGE,
                        'data' => [10, 200]
                    ],
                    'discount' => [
                        'type' => ResponseHandler::FACET_RANGE,
                        'data' => [5, 20]
                    ]
                ]
            ],
            $this->responseHandler->toArray()
        );
    }

    /** @test */
    public function rendersMultipleSortOrders()
    {
        $this->responseHandler->renderSortOrder('name');
        $this->responseHandler->renderSortOrder('price');

        $this->assertEquals(
            [
                'sort' => [
                    'name',
                    'price'
                ]
            ],
            $this->responseHandler->toArray()
        );
    }

    /** @test */
    public function rendersEmptyProductIdentifiers()
    {
        $this->responseHandler->renderProducts();

        $this->assertEquals(
            [
                'products' => []
            ],
            $this->responseHandler->toArray()
        );
    }
    
    /** @test */
    public function rendersNonEmptyListOfProducts() 
    {
        $this->responseHandler->renderProducts(1, 2, 3, 4, 5);
        $this->assertEquals(
            ['products' => [1, 2, 3, 4, 5]],
            $this->responseHandler->toArray()
        );
    }
    
    /** @test */
    public function rendersPagination() 
    {
        $this->responseHandler
            ->renderPagination(15, 1, 15, 20, 50);

        $this->assertEquals(
            [
                'pagination' => [
                    'current' => 1,
                    'size' => 15,
                    'available_sizes' => [
                        15, 20, 50
                    ]
                ]
            ],
            $this->responseHandler->toArray()
        );
    }
    
    
    
}