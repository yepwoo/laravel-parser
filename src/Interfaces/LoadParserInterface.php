<?php


namespace Yepwoo\LaravelParser\Interfaces;


interface LoadParserInterface
{
    public function isBuilderInstance();
    public function isRequiredParameterExist($loaderParam);
}
