<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticlesTable;
use App\Test\Factory\ArticleFactory;
use Cake\TestSuite\TestCase;

class ArticlesTableTest extends TestCase
{
    public function setUp(): void
    {  

    }

    public function testFindPublished(): void
    {
        // Persist 3 published articles
        $articles = ArticleFactory::make(3)->persist();
        // Persist 2 unpublished articles
        ArticleFactory::make(2)->persist();

        $result = $this->Articles->find('all')->find('list')->toArray();

        $expected = [
            $articles[0]->id => $articles[0]->title,
            $articles[1]->id => $articles[1]->title,
            $articles[2]->id => $articles[2]->title,
        ];

        $this->assertEquals($expected, $result);
    }
}