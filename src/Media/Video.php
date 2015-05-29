<?php

namespace Kenarkose\Files\Media;


use Kenarkose\Files\Contract\Substitute\Substitutes as SubstitutesContract;
use Kenarkose\Files\Substitute\Substitutes;

class Video extends Media implements SubstitutesContract {

    use Substitutes;

    /**
     * @var string
     */
    protected $mediaType = 'video';

}