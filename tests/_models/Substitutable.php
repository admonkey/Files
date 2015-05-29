<?php

namespace test;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Files\Contract\Substitute\Substitutable as SubstitutableContract;
use Kenarkose\Files\Substitute\Substitutable as SubstitutableTrait;

class Substitutable extends Eloquent implements SubstitutableContract {

    use SubstitutableTrait;

    protected $mediaModelName = 'test\Substituter';

}