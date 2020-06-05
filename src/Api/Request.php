<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;


interface Request
{
    public function apply(RequestProcessor $processor): void;
}