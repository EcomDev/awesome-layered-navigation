<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;


interface RequestProcessor
{
    public function useCategory(int $categoryId): void;

    public function useSearchText(string $searchText): void;

    public function applyFilter(string $field, array $value): void;

    public function applySort(string $field, string $direction): void;

    public function applyPagination(int $pageSize, int $currentPage): void;
}