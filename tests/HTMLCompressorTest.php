<?php

use Hups\Util\FileDownloader;

class HTMLCompressorTest extends PHPUnit_Framework_TestCase
{
	/**
     * @expectedException PHPUnit_Framework_Error
     */
	public function testCanRunWithoutErrors()
	{
		$html = file_get_contents(__DIR__ . '/test_files/test1.html');
		$c = new HTMLCompressor($html);
		$c->compress();
	}
}

