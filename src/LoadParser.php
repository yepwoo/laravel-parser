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

    /**
     * @return void|LoadRelations
     */
    public function loadRelations()
    {
        $relation = new LoadRelations($this->model, $this->request);
        return $relation->parse();
    }

    /**
     * @return void|LoadAttributes
     */
    public function loadAttributes()
    {
        $attribute_parser = new LoadAttributes($this->model, $this->request);
        return $attribute_parser->parse();
    }

}
