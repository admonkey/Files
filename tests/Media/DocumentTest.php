<?php

class DocumentTest extends TestBase {

    /** @test */
    function it_is_initializable()
    {
        $this->assertInstanceOf(
            'Kenarkose\Files\Media\Document',
            new Kenarkose\Files\Media\Document()
        );
    }

}