<?php

class ImageTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Kenarkose\Files\Media\Image',
            new Kenarkose\Files\Media\Image()
        );
    }

}