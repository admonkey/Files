<?php

namespace test;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Files\Contain\Containable as ContainableTrait;
use Kenarkose\Files\Contract\Contain\Containable as ContainableContract;

class Containable extends Eloquent implements ContainableContract {

    use ContainableTrait;

    /**
     * @var string
     */
    protected $containerModel = 'test\Container';

}