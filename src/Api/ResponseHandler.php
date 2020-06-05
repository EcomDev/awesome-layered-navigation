<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;

interface ResponseHandler
{
    const FACET_OPTION = 'options';
    const FACET_RANGE = 'range';

    public function renderFacet(string $fieldName, string $dataType, array $data): void;

    public function renderSortOrder(string $fieldName): void;

    public function renderTotal(int $totalRecords): void;

    public function renderPagination(int $pageSize, int $currentPage, int ...$pageSizes): void;

    public function renderProducts(int ...$productIds): void;
}