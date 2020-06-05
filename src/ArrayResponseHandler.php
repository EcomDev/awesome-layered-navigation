<?php

namespace EcomDev\AwesomeLayeredNavigation;

use EcomDev\AwesomeLayeredNavigation\Api\ResponseHandler;

final class ArrayResponseHandler implements ResponseHandler
{
    /**
     * Resulting data that's modified on each render call
     *
     * @var array
     */
    private $result = [];

    public function renderFacet(string $fieldName, string $dataType, array $data): void
    {
        $this->result['facets'][$fieldName] = [
            'type' => $dataType,
            'data' => $data
        ];
    }

    public function renderSortOrder(string $fieldName): void
    {
        $this->result['sort'][] = $fieldName;
    }

    public function renderTotal(int $totalRecords): void
    {
        $this->result['total'] = $totalRecords;
    }

    public function renderPagination(int $pageSize, int $currentPage, int ...$pageSizes): void
    {
        $this->result['pagination'] = [
            'size' => $pageSize,
            'current' => $currentPage,
            'available_sizes' => $pageSizes
        ];
    }

    public function renderProducts(int ...$productIds): void
    {
        $this->result['products'] = $productIds;
    }

    public function toArray(): array
    {
        return $this->result;
    }
}