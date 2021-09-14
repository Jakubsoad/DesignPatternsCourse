<?php

class MenuItemsIterator implements Iterator
{
    private MenuItemsCollection $menuItems;
    private int $index = 0;

    public function __construct(MenuItemsCollection $menuItems)
    {
        $this->menuItems = $menuItems;
    }

    public function current(): null|MenuItem
    {
        return $this->menuItems->get($this->index);
    }

    public function next(): null|MenuItem
    {
        $this->index++;

        return $this->menuItems->get($this->index);
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return !is_null($this->menuItems->get($this->index));
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}

class MenuItemsCollection implements IteratorAggregate
{
    private array $items = [];

    public function getIterator(): Iterator
    {
        return new MenuItemsIterator($this);
    }

    public function add(MenuItem $menuItem): void
    {
        $this->items []= $menuItem;
    }

    public function get(int $index): null|MenuItem
    {
        if (array_key_exists($index, $this->items)) {
            return $this->items[$index];
        }
        return null;
    }
}

class MenuItem
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}

$item1 = new MenuItem('User');
$item2 = new MenuItem('Page');
$item3 = new MenuItem('Site');

$menuItems = new MenuItemsCollection();
$menuItems->add($item1);
$menuItems->add($item2);
$menuItems->add($item3);

$menuIterator = new MenuItemsIterator($menuItems);

echo 'Current '.$menuIterator->current().PHP_EOL;
echo 'Key '. $menuIterator->key().PHP_EOL;
echo 'Next '. $menuIterator->next().PHP_EOL;
echo 'Current '.$menuIterator->current().PHP_EOL;
echo 'Next '. $menuIterator->next().PHP_EOL;
echo 'Next '. $menuIterator->next().PHP_EOL;
echo 'Current '.$menuIterator->current().PHP_EOL;
echo 'Rewind '.$menuIterator->rewind().PHP_EOL;
echo 'Current '.$menuIterator->current().PHP_EOL;
