<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;


interface RequestHandler
{
    const SORT_ORDER_DIRECTION_ASCENDING = 'asc';
    const SORT_ORDER_DIRECTION_DESCENDING = 'desc';

    public function useCategory(int $categoryId): void;

    public function useSearchText(string $searchText): void;

    public function applyFilter(string $fieldName, array $value): void;

    public function applySort(string $fieldName, string $direction): void;

    public function applyPagination(int $pageSize, int $currentPage): void;
}