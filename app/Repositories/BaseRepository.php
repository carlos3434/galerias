<?php
namespace App\Repositories;

abstract class BaseRepository {
    /**
     * The Model instance.
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;
}