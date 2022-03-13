<?php


namespace Yepwoo\LaravelParser;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;



class ParentLoader
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var $model
     */
    protected $model;

    public function __construct($model, Request $request) {
        $this->request = $request;
        $this->model   = $model;

    }
    /**
     * Check if the model instance of builder or not
     * @return bool
     */
    public function isBuilderInstance(): bool
    {
        return $this->model instanceof Builder;
    }

    /**
     * Check if required parameters if filler or not
     * @param $loaderParam
     * @return bool
     */
    public function isRequiredParameterExist($loaderParam): bool
    {
        return $this->request->filled($loaderParam);
    }

}
