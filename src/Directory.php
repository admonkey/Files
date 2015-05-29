<?php

namespace Kenarkose\Files;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Kenarkose\Files\Contain\Containable;
use Kenarkose\Files\Contain\MediaContainer;
use Kenarkose\Files\Contract\Contain\Containable as ContainableContract;
use Kenarkose\Files\Contract\Contain\MediaContainer as MediaContainerContract;

class Directory extends Eloquent implements ContainableContract, MediaContainerContract {

    use Containable, MediaContainer;

    /**
     * @var string
     */
    protected $containerKey = 'directory_id';

    /**
     * The fillable fields for the model.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Returns the subdirectories
     *
     * @return mixed
     */
    public function getSubdirectories()
    {
        return $this->subdirectories;
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
     * Relation for subdirectories
     *
     * @return HasMany
     */
    public function subdirectories()
    {
        return $this->hasMany(
            $this->getContainerClassName(),
            $this->getContainerKeyName(),
            $this->getKeyName()
        );
    }

}