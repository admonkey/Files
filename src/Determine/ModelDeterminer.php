<?php

namespace Kenarkose\Files\Determine;


use Illuminate\Contracts\Config\Repository;
use Kenarkose\Files\Contract\Determine\ModelDeterminer as ModelDeterminerContract;

class ModelDeterminer implements ModelDeterminerContract {

    /**
     * @var array
     */
    protected $mediaTypes = [
        'audio'    => [
            'audio/aac', 'audio/mp4', 'audio/mpeg', 'audio/ogg', 'audio/wav', 'audio/webm'
        ],
        'document' => [
            'text/plain', 'application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint'
        ],
        'image'    => [
            'image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'
        ],
        'video'    => [
            'video/mp4', 'video/ogg', 'video/webm'
        ]
    ];

    /**
     * @var array
     */
    protected $modelTypes = [
        'audio'    => 'Kenarkose\Files\Media\Audio',
        'document' => 'Kenarkose\Files\Media\Document',
        'image'    => 'Kenarkose\Files\Media\Image',
        'video'    => 'Kenarkose\Files\Media\Video'
    ];

    /**
     * Constructor
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;

        if ($mediaTypes = $this->config->get('files.media_types'))
        {
            $this->modelTypes = $mediaTypes;
        }

        if ($modelTypes = $this->config->get('files.model_types'))
        {
            $this->modelTypes = $modelTypes;
        }
    }

    /**
     * Returns the media type for given mimetype
     *
     * @param string $mimetype
     * @return string
     */
    public function getMediaType($mimetype)
    {
        foreach ($this->mediaTypes as $type => $mimeTypes)
        {
            if (in_array($mimetype, $mimeTypes))
            {
                return $type;
            }
        }

        return null;
    }

    /**
     * Returns the model class name for given type
     *
     * @param string $type
     * @return string
     */
    public function getMediaModelName($type)
    {
        return isset($this->modelTypes[$type]) ?
            $this->modelTypes[$type] :
            $this->getDefaultMediaModelName();
    }

    /**
     * Returns the default media model class path
     *
     * @return string
     */
    public function getDefaultMediaModelName()
    {
        return $this->config->get('files.media_model', 'Kenarkose\Files\Media\Media');
    }

}