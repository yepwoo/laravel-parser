<?php


namespace Yepwoo\LaravelParser;

use Illuminate\Http\Request;

class LoadParser
{
    private Request $request;

    private $model;

    public function __construct($request, $model)
    {
        $this->request = $request;
        $this->model   = $model;
    }


    public function loadRelations(): loadRelations
    {
        return new loadRelations($this->model, $this->request);
    }

    public function loadAttributes(): loadAttributes
    {
        return new loadAttributes($this->model, $this->request);
    }

}
