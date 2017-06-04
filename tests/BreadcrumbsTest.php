<?php
namespace Tests;

use InvalidArgumentException;
use Symfony\Component\DomCrawler\Crawler;
use Xety\Breadcrumbs\Breadcrumbs;

class BreadCrumbsTest extends TestCase
{
    /**
     * A set of valid breadcrumbs predefined.
     *
     * @var array
     */
    protected $breadcrumbsValid = [];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        $this->breadcrumbsValid = require 'Vendor/breadcrumbs_valid.php';
    }

    /**
     * testConstrcutor method
     *
     * @return void
     */
    public function testConstrcutor()
    {
        $breadcrumbs = new Breadcrumbs(
            [
                [
                    'name' => 'Home',
                    'href' => '/'
                ]
            ],
            [
                'position' => true,
                'divider' => '|'
            ]
        );
        $this->assertSame('|', $breadcrumbs->getOption('divider'));
        $this->assertTrue($breadcrumbs->getOption('position'));
        $this->assertSame(
            [
                [
                    'name' => 'Home',
                    'href' => '/'
                ]
            ],
            $breadcrumbs->getBreadcrumbs()
        );
    }

    /**
     * testAddBreadcrumbs method
     *
     * @return void
     */
    public function testAddBreadcrumbs()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);

        $this->assertSame($this->breadcrumbsValid, $breadcrumbs->getBreadcrumbs()
        );
    }

    /**
     * testAddBreadCrumbsMissingRequiredArgs method
     *
     * @return void
     */
    public function testAddBreadCrumbsMissingRequiredArgs()
    {
        $this->expectException(InvalidArgumentException::class);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs(
            [
                [
                    'name' => 'Home'
                ]
            ]
        );
    }

    /**
     * testAdd method
     *
     * @return void
     */
    public function testAdd()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('Home', '/home');
        $this->assertSame([
            [
                'name' => 'Home',
                'href' => '/home'
            ]
        ], $breadcrumbs->getBreadcrumbs());
    }

    /**
     * testValidateCrumbEmptyValues method
     *
     * @return void
     */
    public function testValidateCrumbEmptyValues()
    {
        $this->expectException(InvalidArgumentException::class);

        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->add('', '');
    }

    /**
     * testCount method
     *
     * @return void
     */
    public function testCount()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);
        $this->assertSame(count($this->breadcrumbsValid), $breadcrumbs->count());
    }

    /**
     * testFirst method
     *
     * @return void
     */
    public function testFirst()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);
        $this->assertSame([
            'name' => 'Home',
            'href' => '/home'
        ], $breadcrumbs->first());
    }

    /**
     * testFirstEmpty method
     *
     * @return void
     */
    public function testFirstEmpty()
    {
        $breadcrumbs = new Breadcrumbs;
        $this->assertSame([], $breadcrumbs->first());
    }

    /**
     * testFirstFormated method
     *
     * @return void
     */
    public function testFirstFormated()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);

        $first = $breadcrumbs->firstFormated();
        $crawler = new Crawler($first);

        $element = $crawler->filter('a');

        $this->assertSame(1, $element->count());
        $this->assertSame('breadcrumb-item', $element->first()->attr('class'));
        $this->assertSame('/home', $element->first()->attr('href'));
        $this->assertSame('Home', $element->first()->text());
    }

    /**
     * testFirstFormatedEmpty method
     *
     * @return void
     */
    public function testFirstFormatedEmpty()
    {
        $breadcrumbs = new Breadcrumbs;
        $first = $breadcrumbs->firstFormated();

        $this->assertEmpty($first);
    }

    /**
     * testLast method
     *
     * @return void
     */
    public function testLast()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);
        $this->assertSame([
            'name' => 'Article',
            'href' => 'https://exemple.com/blog/article'
        ], $breadcrumbs->last());
    }

    /**
     * testLastEmpty method
     *
     * @return void
     */
    public function testLastEmpty()
    {
        $breadcrumbs = new Breadcrumbs;
        $this->assertSame([], $breadcrumbs->last());
    }

    /**
     * testLastFormated method
     *
     * @return void
     */
    public function testLastFormated()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);

        $last = $breadcrumbs->lastFormated();
        $crawler = new Crawler($last);

        $element = $crawler->filter('a');

        $this->assertSame(1, $element->count());
        $this->assertSame('breadcrumb-item', $element->first()->attr('class'));
        $this->assertSame('https://exemple.com/blog/article', $element->first()->attr('href'));
        $this->assertSame('Article', $element->first()->text());
    }

    /**
     * testLastFormatedEmpty method
     *
     * @return void
     */
    public function testLastFormatedEmpty()
    {
        $breadcrumbs = new Breadcrumbs;
        $last = $breadcrumbs->lastFormated();

        $this->assertEmpty($last);
    }

    /**
     * testClear method
     *
     * @return void
     */
    public function testClear()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);
        $this->assertNotEmpty($breadcrumbs->getBreadcrumbs());

        $breadcrumbs->clear();
        $this->assertEmpty($breadcrumbs->getBreadcrumbs());
    }

    /**
     * testOutput method
     *
     * @return void
     */
    public function testOutput()
    {
        $breadcrumbs = new Breadcrumbs;
        $breadcrumbs->addBreadcrumbs($this->breadcrumbsValid);

        $render = $breadcrumbs->render();
        $crawler = new Crawler($render);

        $container = $crawler->filter('nav');
        $item = $crawler->filter('a');
        $active = $crawler->filter('span');

        $this->assertSame(1, $container->count());
        $this->assertSame(count($this->breadcrumbsValid) - 1, $item->count());
        $this->assertSame(1, $active->count());

        $this->assertSame('breadcrumb', $container->first()->attr('class'));
        $this->assertSame('breadcrumb-item', $item->first()->attr('class'));
        $this->assertSame('breadcrumb-item active', $active->first()->attr('class'));
    }

    /**
     * testOutputWithPositionAndDivider method
     *
     * @return void
     */
    public function testOutputWithPositionAndDivider()
    {
        $breadcrumbs = new Breadcrumbs($this->breadcrumbsValid, ['position' => true, 'divider' => '|']);

        $render = $breadcrumbs->render();
        $this->assertSame(
            '<nav class="breadcrumb">' .
                '<a data-position="1" class="breadcrumb-item" href="/home">Home</a>' .
                '<span class="divider">|</span>' .
                '<a data-position="2" class="breadcrumb-item" href="http://exemple.com/blog">Blog</a>' .
                '<span class="divider">|</span>' .
                '<span data-position="3" class="breadcrumb-item active">Article</span>' .
            '</nav>',
            $render
        );
    }

    /**
     * testOutputNoBreadcrumbs method
     *
     * @return void
     */
    public function testOutputNoBreadcrumbs()
    {
        $breadcrumbs = new Breadcrumbs;
        $render = $breadcrumbs->render();

        $this->assertSame('', $render);
    }

    /**
     * testOutputFullFeatured method
     *
     * @return void
     */
    public function testOutputFullFeatured()
    {
        $breadcrumbs = new Breadcrumbs(
            $this->breadcrumbsValid,
            [
                'position' => true,
                'divider' => '#',
                'dividerElement' => 'li',
                'dividerElementClasses'=> [
                    'custom',
                    'divider'
                ],
                'listElement' => 'ul',
                'listElementClasses' => [
                    'custom',
                    'container'
                ],
                'listItemElement' => 'li',
                'listItemElementClasses' => [
                    'custom',
                    'item'
                ],
                'listActiveElement' => 'li',
                'listActiveElementClasses' => [
                    'custom',
                    'active'
                ]
            ]
        );

        $render = $breadcrumbs->render();
        $this->assertSame(
            '<ul class="custom container">' .
                '<li data-position="1" class="custom item" href="/home">Home</li>' .
                '<li class="custom divider">#</li>' .
                '<li data-position="2" class="custom item" href="http://exemple.com/blog">Blog</li>' .
                '<li class="custom divider">#</li>' .
                '<li data-position="3" class="custom active">Article</li>' .
            '</ul>',
            $render
        );
    }

    /**
     * testAddSlashToRelativeURL method
     *
     * @return void
     */
    public function testAddSlashToRelativeURL()
    {
        $breadcrumbs = new Breadcrumbs([
            [
                'name' => 'Home',
                'href' => '/home'
            ],
            [
                'name' => 'Blog',
                'href' => 'blog',
            ],
            [
                'name' => 'Article',
                'href' => '/article'
            ]
        ]);
        $render = $breadcrumbs->render();
        $crawler = new Crawler($render);

        $item = $crawler->filter('a');
        $this->assertSame('/home', $item->first()->attr('href'));
        $this->assertSame('/blog', $item->last()->attr('href'));
    }
}
