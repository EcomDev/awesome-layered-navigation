<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;

interface ResponseProcessor
{
    public function addFacet(string $filter, Facet $facet): void;
}