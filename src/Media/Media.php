<?php

namespace Kenarkose\Files\Media;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Files\Contain\Containable;
use Kenarkose\Files\Contract\Contain\Containable as ContainableContract;
use Kenarkose\Files\Determine\AutoDeterminesType;

class Media extends Eloquent implements ContainableContract {

    use Containable, AutoDeterminesType;

    /**
     * @var string
     */
    protected $containerKey = 'directory_id';

    /**
     * @var string
     */
    protected $table = 'media';

    /**
     * The fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = ['extension', 'mimetype', 'size', 'name', 'path'];

    /**
     * Syntactic sugar for moveToContainer
     *
     * @param mixed $container
     */
    public function moveToDirectory($container)
    {
        return $this->moveToContainer($container);
    }

    /**
     * Syntactic sugar for getContainer
     *
     * @return mixed
     */
    public function getParentDirectory()
    {
        return $this->getContainer();
    }

}