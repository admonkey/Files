<?php

namespace Kenarkose\Files\Contain;


use Kenarkose\Files\Contract\Contain\Containable as ContainableContract;

trait MediaContainer {

    /**
     * Returns the children media
     *
     * @return mixed
     */
    public function getContainedMedia()
    {
        return $this->containedMedia;
    }

    /**
     * Contains a containable
     *
     * @param ContainableContract $containable
     * @return ContainableContract
     */
    public function contain(ContainableContract $containable)
    {
        return $containable->moveToContainer($this);
    }

    /**
     * Relation for children directories
     *
     * @return HasMany
     */
    public function containedMedia()
    {
        return $this->hasMany(
            $this->getMediaClassName(),
            $this->getContainerKeyName(),
            $this->getKeyName()
        );
    }

    /**
     * Returns the current class name
     *
     * @return string
     */
    public function getMediaClassName()
    {
        // We define the mediaModelName attribute implicitly
        // in order to avoid incompatibility issues with parent class
        return $this->mediaModelName ?: 'Kenarkose\Files\Media\Media';
    }

}