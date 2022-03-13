<?php


namespace Yepwoo\LaravelParser;


use Illuminate\Http\Request;
use Yepwoo\LaravelParser\Interfaces\LoadParserInterface;

class loadAttributes extends ParentLoader implements LoadParserInterface
{
    public function __construct($model, Request $request)
    {
        parent::__construct($model, $request);

        $loaderParam = 'append';

        if (
            !$this->isRequiredParameterExist($loaderParam)
        ) {
            return;
        }

        $attributeMethod = 'append';

        $this->attributesLoading($loaderParam, $attributeMethod);
    }

    private function attributesLoading($loaderParam, $attributeMethod)
    {
        $requestedAttributes = $this->request->get($loaderParam);

        $attributesToArray = explode(',', $requestedAttributes);

        $this->model->$attributeMethod($attributesToArray);
    }
}