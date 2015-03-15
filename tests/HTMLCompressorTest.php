<?php

use Hups\Util\HTMLCompressor;

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

	public function testCanRemoveWhitespaces()
	{
		$html = file_get_contents(__DIR__ . '/test_files/test2_whitespace.html');

		$c = new HTMLCompressor($html);
		$c->removeWhitespaces();

		$result = $c->get();

		$this->assertEquals($result, '<!DOCTYPE html><html><head><meta charset=utf-8 /><title></title></head><body>test<pre> </pre></body></html>');		
	}

	public function testCanRemoveComments()
	{
		$html = file_get_contents(__DIR__ . '/test_files/test3_comments.html');

		$c = new HTMLCompressor($html);
		$c->removeComments();

		$result = $c->get();

		$this->assertEquals($result, '<!DOCTYPE html><html><head><meta charset=utf-8 /><title></title></head><body>test</body></html>');		
	}

	public function testCanReplaceAbsoluteUrls()
	{
		$html = file_get_contents(__DIR__ . '/test_files/test4_absolute_urls.html');

		$c = new HTMLCompressor($html);
		$c->replaceAbsoluteUrls(array('test.hostname.com'));

		$result = $c->get();

		$this->assertEquals($result, '<!DOCTYPE html><html><head><meta charset=utf-8 /><title></title></head><body><a href="/link/path">test</a></body></html>');		
	}
}

