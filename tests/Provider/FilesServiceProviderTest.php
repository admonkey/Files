<?php

class FilesServiceProviderTest extends TestBase {

    /** @test */
    function it_registers_model_determiner()
    {
        $this->assertInstanceOf(
            'Kenarkose\Files\Determine\ModelDeterminer',
            app()->make('files.model_determiner')
        );
    }

}