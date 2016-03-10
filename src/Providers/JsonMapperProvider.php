<?php
/**
 * User: Allan G. Ramirez
 * Email: ramirezag@gmail.com
 * Date: 5/23/15
 */

namespace NHLNumbers\Dto\Providers;

use Illuminate\Support\ServiceProvider;
use Weasel\JsonMarshaller\JsonMapper;
use Weasel\WeaselDoctrineAnnotationDrivenFactory;

class JsonMapperProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(JsonMapper::class, function () {
            $factory = new WeaselDoctrineAnnotationDrivenFactory();

            $json_mapper = $factory->getJsonMapperInstance();
            $json_mapper->registerJsonType("boolean", new BoolType(), array("bool"));

            return $json_mapper;
        });
    }
}