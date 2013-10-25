<?php

class SiteControllerTest extends WUnitTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/site/index');

        $this->assertTrue($crawler->filter('html:contains("Congratulations!")')->count() > 0);
    }
}