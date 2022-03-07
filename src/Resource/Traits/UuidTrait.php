<?php


namespace Src\Resource\Traits;


use Illuminate\Support\Str;

trait UuidTrait
{
    protected static function bootUuidTrait()
    {
        static::creating(function($model) {
            if(!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    function getIncrementing(): bool
    {
        return false;
    }

    function getKeyType(): string
    {
        return 'string';
    }
}
