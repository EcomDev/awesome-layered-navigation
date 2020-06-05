<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;


interface Request
{
    public function apply(RequestHandler $processor): void;
}