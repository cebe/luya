<?php

namespace crawlerests\frontend\classes;

use luya\crawler\frontend\classes\CrawlPage;
use Symfony\Component\DomCrawler\Crawler;

class CrawlPageTest extends \PHPUnit_Framework_TestCase
{
	public $object = null;
	
	protected function setUp()
	{
		$this->app = new \luya\Boot();
		$this->app->setConfigArray([
		    'id' => 'testenv',
		    'siteTitle' => 'Luya Tests',
		    'remoteToken' => 'testtoken',
		    'basePath' => dirname(__DIR__),
		]);
		$this->app->mockOnly = true;
		$this->app->setYiiPath(__DIR__.'/../../../vendor/yiisoft/yii2/Yii.php');
		$this->app->applicationWeb();
		
		$this->object = new CrawlPage(['baseUrl' => 'http://localhost', 'pageUrl' => 'http://localhost', 'verbose' => false, 'useH1' => false]);
		$this->object->setCrawler(new Crawler(file_get_contents('tests/data/luyaio.html')));
	}
	
	public function testCrawlerLinks()
	{
		$this->assertSame(149, count($this->object->getLinks()));
	}
	
	public function testLanguage()
	{
		$this->assertSame('en', $this->object->getLanguageInfo());
	}
	
	public function testTitle()
	{
		$this->assertSame('Title Tag', $this->object->getTitle());
	}
	
	public function testTitleH1()
	{
		$this->assertSame('Guide', $this->object->getTitleH1());
	}
	
	public function testFalseCrawlerTitle()
	{
		$this->assertFalse($this->object->getTitleCrawlerTag());
	}
	
	public function testGetGroup()
	{
		$this->assertSame('grp', $this->object->getGroup());
	}
	
	public function testSuccessCrawlerTitle()
	{
		$this->object->setCrawler(new Crawler(file_get_contents('tests/data/titletest.html')));
		$this->assertSame('Crawler Title', $this->object->getTitleCrawlerTag());
		
		$this->assertSame('Heading 1', CrawlPage::cleanupString($this->object->getCrawlerHtml()));

		$this->assertSame('Heading 1', $this->object->getContent());
	}

	public function testRemoveScriptTagsInContent()
	{
		$this->object->setCrawler(new Crawler('1<script>2</script>3'));
		$this->assertSame('13', $this->object->getContent());
	}
	
}