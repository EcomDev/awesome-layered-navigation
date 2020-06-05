<?php


namespace EcomDev\AwesomeLayeredNavigation\Api;


interface Response
{
    public function apply(ResponseHandler $handler): void;
}