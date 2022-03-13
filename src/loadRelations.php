<?php


namespace Yepwoo\LaravelParser;

use Illuminate\Http\Request;
use Yepwoo\LaravelParser\Interfaces\LoadParserInterface;

class loadRelations extends ParentLoader implements LoadParserInterface
{

    public function __construct($model, Request $request)
    {
        parent::__construct($model, $request);

        $loaderParam  = 'with';
        if (!$this->isRequiredParameterExist($loaderParam)) {
            return;
        }

        $relationMethod = 'loadMissing';

        if ($this->isBuilderInstance()) {
            $this->changeRelationMethod($relationMethod);
        }

        $this->relationsLoading($loaderParam, $relationMethod);
    }

    /**
     * Change relation method in builder case
     * @param $relationMethod
     */
    private function changeRelationMethod(&$relationMethod)
    {
        $relationMethod = 'with';
    }

    /**
     * Load relations
     * @param $loaderParam
     * @param $relationMethod
     */
    private function relationsLoading($loaderParam, $relationMethod)
    {
        $requestedRelations = $this->request->get($loaderParam);

        $relationsToArray = explode(',', $requestedRelations);

        $this->model->$relationMethod($relationsToArray);
    }
}
