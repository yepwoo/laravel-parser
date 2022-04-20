<?php


namespace Yepwoo\LaravelParser\Test\Unit;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
use ReflectionClass;
use Yepwoo\LaravelParser\LoadRelations;
use Yepwoo\LaravelParser\Test\TestCase;

class LoadRelationTest extends TestCase
{
    public function testChangeRelationMethod()
    {
        $model = new ModelStub();

        $relationMethod = 'load';
        $change_relation_method = self::callMethod('changeRelationMethod');
        $relation_obj = new LoadRelations($model, $this->request);
        $change_relation_method->invokeArgs($relation_obj, array(&$relationMethod));

        $this->assertEquals('with', $relationMethod);
    }

    /**
     * @todo
     * @throws \ReflectionException
     */
    public function testRelationLoading()
    {
        $model = new ModelRelationStub();

        $loader_param    = 'with';
        $relation_method = 'loadMissing';
        $change_relation_method = self::callMethod('relationsLoading');
        $relation_obj = new LoadRelations($model, $this->request);
        $change_relation_method->invokeArgs($relation_obj, array($loader_param, $relation_method));
    }

    protected static function callMethod($name): \ReflectionMethod
    {
        $class = new ReflectionClass(\Yepwoo\LaravelParser\LoadRelations::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}


class ModelStub extends Model {


}

class ModelRelationStub extends Model {

    public function relationStub(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModelStub::class);
    }
}
