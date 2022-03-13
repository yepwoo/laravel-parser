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

    public function loadRelations(): LoadRelations
    {
        return new LoadRelations($this->model, $this->request);
    }

    public function loadAttributes(): LoadAttributes
    {
        return new LoadAttributes($this->model, $this->request);
    }

}
