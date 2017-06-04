<?php
namespace Tests;

use InvalidArgumentException;
use Xety\Breadcrumbs\Breadcrumbs;

class BreadCrumbsTraitTest extends TestCase
{
    /**
     * The Breadcrumbs instance.
     *
     * @var \Xety\Breadcrumbs\Breadcrumbs
     */
    protected $breadcrumbs;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        $this->breadcrumbs = new Breadcrumbs;
    }

    /**
     * testSetDivider method
     *
     * @return void
     */
    public function testSetDivider()
    {
        $this->breadcrumbs->setDivider('@');
        $this->assertSame('@', $this->breadcrumbs->getOption('divider'));

        $this->breadcrumbs->setDivider(null);
        $this->assertSame(null, $this->breadcrumbs->getOption('divider'));

        $this->expectException(InvalidArgumentException::class);
        $this->breadcrumbs->setDivider(['invalid']);
    }

    /**
     * testGetDivider method
     *
     * @return void
     */
    public function testGetDivider()
    {
        $this->breadcrumbs->setDivider('@');
        $this->assertSame($this->breadcrumbs->getDivider(), $this->breadcrumbs->getOption('divider'));
    }

    /**
     * testSetDividerElement method
     *
     * @return void
     */
    public function testSetDividerElement()
    {
        $this->breadcrumbs->setDividerElement('li');
        $this->assertSame('li', $this->breadcrumbs->getOption('dividerElement'));

        $this->expectException(InvalidArgumentException::class);
        $this->breadcrumbs->setDividerElement('img');
    }

    /**
     * testGetDividerElement method
     *
     * @return void
     */
    public function testGetDividerElement()
    {
        $this->breadcrumbs->setDividerElement('li');
        $this->assertSame($this->breadcrumbs->getDividerElement(), $this->breadcrumbs->getOption('dividerElement'));
    }

    /**
     * testSetDividerElementClasses method
     *
     * @return void
     */
    public function testSetDividerElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setDividerElementClasses($classes);
        $this->assertSame($classes, $this->breadcrumbs->getOption('dividerElementClasses'));

        $this->breadcrumbs->setDividerElementClasses('class1 class2 class3');
        $this->assertSame($classes, $this->breadcrumbs->getOption('dividerElementClasses'));
    }

    /**
     * testSetDividerElementClassesWrongClassesFormat method
     *
     * @return void
     */
    public function testSetDividerElementClassesWrongClassesFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = ['class1', ['class2'], 'class3'];
        $this->breadcrumbs->setDividerElementClasses($classes);
    }

    /**
     * testSetDividerElementClassesWrongFormat method
     *
     * @return void
     */
    public function testSetDividerElementClassesWrongFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = false;
        $this->breadcrumbs->setDividerElementClasses($classes);
    }

    /**
     * testGetDividerElementClasses method
     *
     * @return void
     */
    public function testGetDividerElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setDividerElementClasses($classes);
        $this->assertSame(
            $this->breadcrumbs->getDividerElementClasses(),
            $this->breadcrumbs->getOption('dividerElementClasses')
        );
    }

    /**
     * testAddDividerElementClasses method
     *
     * @return void
     */
    public function testAddDividerElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addDividerElementClasses($classes);
        $this->assertSame(
            ['divider', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('dividerElementClasses')
        );
        // Reset the classes.
        $this->breadcrumbs->setDividerElementClasses('divider');

        $this->breadcrumbs->addDividerElementClasses('class1 class2 class3 class3');
        $this->assertSame(
            ['divider', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('dividerElementClasses')
        );
    }

    /**
     * testRemoveDividerElementClasses method
     *
     * @return void
     */
    public function testRemoveDividerElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addDividerElementClasses($classes);

        $this->breadcrumbs->removeDividerElementClasses(['class2', 'class1']);
        $this->assertSame(
            [0 => 'divider', 3 => 'class3'],
            $this->breadcrumbs->getOption('dividerElementClasses')
        );

        // Reset the classes.
        $this->breadcrumbs->setDividerElementClasses(['divider', 'class1', 'class2', 'class3', 'class3']);
        $this->breadcrumbs->removeDividerElementClasses('class2 class1');
        $this->assertSame(
            [0 => 'divider', 3 => 'class3'],
            $this->breadcrumbs->getOption('dividerElementClasses')
        );
    }

    /**
     * testSetListElement method
     *
     * @return void
     */
    public function testSetListElement()
    {
        $this->breadcrumbs->setListElement('ul');
        $this->assertSame('ul', $this->breadcrumbs->getOption('listElement'));

        $this->expectException(InvalidArgumentException::class);
        $this->breadcrumbs->setListElement('img');
    }

    /**
     * testGetListElement method
     *
     * @return void
     */
    public function testGetListElement()
    {
        $this->breadcrumbs->setListElement('ul');
        $this->assertSame($this->breadcrumbs->getListElement(), $this->breadcrumbs->getOption('listElement'));
    }

    /**
     * testSetListElementClasses method
     *
     * @return void
     */
    public function testSetListElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListElementClasses($classes);
        $this->assertSame($classes, $this->breadcrumbs->getOption('listElementClasses'));

        $this->breadcrumbs->setListElementClasses('class1 class2 class3');
        $this->assertSame($classes, $this->breadcrumbs->getOption('listElementClasses'));
    }

    /**
     * testSetListElementClassesWrongClassesFormat method
     *
     * @return void
     */
    public function testSetListElementClassesWrongClassesFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = ['class1', ['class2'], 'class3'];
        $this->breadcrumbs->setListElementClasses($classes);
    }

    /**
     * testSetListElementClassesWrongFormat method
     *
     * @return void
     */
    public function testSetListElementClassesWrongFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = false;
        $this->breadcrumbs->setListElementClasses($classes);
    }

    /**
     * testGetListElementClasses method
     *
     * @return void
     */
    public function testGetListElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListElementClasses($classes);
        $this->assertSame(
            $this->breadcrumbs->getListElementClasses(),
            $this->breadcrumbs->getOption('listElementClasses')
        );
    }

    /**
     * testAddListElementClasses method
     *
     * @return void
     */
    public function testAddListElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListElementClasses($classes);
        $this->assertSame(
            ['breadcrumb', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listElementClasses')
        );
        // Reset the classes.
        $this->breadcrumbs->setListElementClasses('breadcrumb');

        $this->breadcrumbs->addListElementClasses('class1 class2 class3 class3');
        $this->assertSame(
            ['breadcrumb', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listElementClasses')
        );
    }

    /**
     * testRemoveListElementClasses method
     *
     * @return void
     */
    public function testRemoveListElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListElementClasses($classes);

        $this->breadcrumbs->removeListElementClasses(['class2', 'class1']);
        $this->assertSame(
            [0 => 'breadcrumb', 3 => 'class3'],
            $this->breadcrumbs->getOption('listElementClasses')
        );

        // Reset the classes.
        $this->breadcrumbs->setListElementClasses(['breadcrumb', 'class1', 'class2', 'class3', 'class3']);
        $this->breadcrumbs->removeListElementClasses('class2 class1');
        $this->assertSame(
            [0 => 'breadcrumb', 3 => 'class3'],
            $this->breadcrumbs->getOption('listElementClasses')
        );
    }

    /**
     * testSetListItemElement method
     *
     * @return void
     */
    public function testSetListItemElement()
    {
        $this->breadcrumbs->setListItemElement('li');
        $this->assertSame('li', $this->breadcrumbs->getOption('listItemElement'));

        $this->expectException(InvalidArgumentException::class);
        $this->breadcrumbs->setListItemElement('img');
    }

    /**
     * testGetListItemElement method
     *
     * @return void
     */
    public function testGetListItemElement()
    {
        $this->breadcrumbs->setListItemElement('li');
        $this->assertSame($this->breadcrumbs->getListItemElement(), $this->breadcrumbs->getOption('listItemElement'));
    }

    /**
     * testSetListItemElementClasses method
     *
     * @return void
     */
    public function testSetListItemElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListItemElementClasses($classes);
        $this->assertSame($classes, $this->breadcrumbs->getOption('listItemElementClasses'));

        $this->breadcrumbs->setListItemElementClasses('class1 class2 class3');
        $this->assertSame($classes, $this->breadcrumbs->getOption('listItemElementClasses'));
    }

    /**
     * testSetListItemElementClassesWrongClassesFormat method
     *
     * @return void
     */
    public function testSetListItemElementClassesWrongClassesFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = ['class1', ['class2'], 'class3'];
        $this->breadcrumbs->setListItemElementClasses($classes);
    }

    /**
     * testSetListItemElementClassesWrongFormat method
     *
     * @return void
     */
    public function testSetListItemElementClassesWrongFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = false;
        $this->breadcrumbs->setListItemElementClasses($classes);
    }

    /**
     * testGetListItemElementClasses method
     *
     * @return void
     */
    public function testGetListItemElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListItemElementClasses($classes);
        $this->assertSame(
            $this->breadcrumbs->getListItemElementClasses(),
            $this->breadcrumbs->getOption('listItemElementClasses')
        );
    }

    /**
     * testAddListItemElementClasses method
     *
     * @return void
     */
    public function testAddListItemElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListItemElementClasses($classes);
        $this->assertSame(
            ['breadcrumb-item', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listItemElementClasses')
        );
        // Reset the classes.
        $this->breadcrumbs->setListItemElementClasses('breadcrumb-item');

        $this->breadcrumbs->addListItemElementClasses('class1 class2 class3 class3');
        $this->assertSame(
            ['breadcrumb-item', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listItemElementClasses')
        );
    }

    /**
     * testRemoveListItemElementClasses method
     *
     * @return void
     */
    public function testRemoveListItemElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListItemElementClasses($classes);

        $this->breadcrumbs->removeListItemElementClasses(['class2', 'class1']);
        $this->assertSame(
            [0 => 'breadcrumb-item', 3 => 'class3'],
            $this->breadcrumbs->getOption('listItemElementClasses')
        );

        // Reset the classes.
        $this->breadcrumbs->setListItemElementClasses(['breadcrumb-item', 'class1', 'class2', 'class3', 'class3']);
        $this->breadcrumbs->removeListItemElementClasses('class2 class1');
        $this->assertSame(
            [0 => 'breadcrumb-item', 3 => 'class3'],
            $this->breadcrumbs->getOption('listItemElementClasses')
        );
    }

    /**
     * testSetListActiveElement method
     *
     * @return void
     */
    public function testSetListActiveElement()
    {
        $this->breadcrumbs->setListActiveElement('li');
        $this->assertSame('li', $this->breadcrumbs->getOption('listActiveElement'));

        $this->expectException(InvalidArgumentException::class);
        $this->breadcrumbs->setListActiveElement('img');
    }

    /**
     * testGetListActiveElement method
     *
     * @return void
     */
    public function testGetListActiveElement()
    {
        $this->breadcrumbs->setListActiveElement('li');
        $this->assertSame(
            $this->breadcrumbs->getListActiveElement(),
            $this->breadcrumbs->getOption('listActiveElement')
        );
    }

    /**
     * testSetListActiveElementClasses method
     *
     * @return void
     */
    public function testSetListActiveElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListActiveElementClasses($classes);
        $this->assertSame($classes, $this->breadcrumbs->getOption('listActiveElementClasses'));

        $this->breadcrumbs->setListActiveElementClasses('class1 class2 class3');
        $this->assertSame($classes, $this->breadcrumbs->getOption('listActiveElementClasses'));
    }

    /**
     * testSetListActiveElementClassesWrongClassesFormat method
     *
     * @return void
     */
    public function testSetListActiveElementClassesWrongClassesFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = ['class1', ['class2'], 'class3'];
        $this->breadcrumbs->setListActiveElementClasses($classes);
    }

    /**
     * testSetListActiveElementClassesWrongFormat method
     *
     * @return void
     */
    public function testSetListActiveElementClassesWrongFormat()
    {
        $this->expectException(InvalidArgumentException::class);
        $classes = false;
        $this->breadcrumbs->setListActiveElementClasses($classes);
    }

    /**
     * testGetListActiveElementClasses method
     *
     * @return void
     */
    public function testGetListActiveElementClasses()
    {
        $classes = ['class1', 'class2', 'class3'];
        $this->breadcrumbs->setListActiveElementClasses($classes);
        $this->assertSame(
            $this->breadcrumbs->getListActiveElementClasses(),
            $this->breadcrumbs->getOption('listActiveElementClasses')
        );
    }

    /**
     * testAddListActiveElementClasses method
     *
     * @return void
     */
    public function testAddListActiveElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListActiveElementClasses($classes);
        $this->assertSame(
            ['breadcrumb-item', 'active', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listActiveElementClasses')
        );
        // Reset the classes.
        $this->breadcrumbs->setListActiveElementClasses('breadcrumb-item active');

        $this->breadcrumbs->addListActiveElementClasses('class1 class2 class3 class3');
        $this->assertSame(
            ['breadcrumb-item', 'active', 'class1', 'class2', 'class3'],
            $this->breadcrumbs->getOption('listActiveElementClasses')
        );
    }

    /**
     * testRemoveListActiveElementClasses method
     *
     * @return void
     */
    public function testRemoveListActiveElementClasses()
    {
        $classes = ['class1', 'class2', 'class3', 'class3'];
        $this->breadcrumbs->addListActiveElementClasses($classes);

        $this->breadcrumbs->removeListActiveElementClasses(['class2', 'class1']);
        $this->assertSame(
            [0 => 'breadcrumb-item', 1 => 'active', 4 => 'class3'],
            $this->breadcrumbs->getOption('listActiveElementClasses')
        );

        // Reset the classes.
        $this->breadcrumbs->setListActiveElementClasses(
            ['breadcrumb-item', 'active', 'class1', 'class2', 'class3', 'class3']
        );
        $this->breadcrumbs->removeListActiveElementClasses('class2 class1');
        $this->assertSame(
            [0 => 'breadcrumb-item', 1 => 'active', 4 => 'class3'],
            $this->breadcrumbs->getOption('listActiveElementClasses')
        );
    }
}
