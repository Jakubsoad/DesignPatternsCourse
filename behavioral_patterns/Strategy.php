<?php

interface SortStrategy
{
    public function sort(array $list): string;
}

class QuickSort implements SortStrategy
{
    public function sort(array $list): string
    {
        return 'List sorted with quick sort algorithm';
    }
}

class BucketSort implements SortStrategy
{
    public function sort(array $list): string
    {
        return 'List sorted with bucket sort algorithm';
    }
}

class InsertionSort implements SortStrategy
{
    public function sort(array $list): string
    {
        return 'List sorted with insertion sort algorithm';
    }
}

class SortingComponent
{
    private SortStrategy $sortStrategy;

    public function __construct(SortStrategy $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }

    public function sortList(array $list): string
    {
        return $this->sortStrategy->sort($list);
    }
}

$list = [2, 5, 3];

$sortingComponent = new SortingComponent(new QuickSort());
echo $sortingComponent->sortList($list);
echo PHP_EOL;

$sortingComponent = new SortingComponent(new BucketSort());
echo $sortingComponent->sortList($list);
echo PHP_EOL;

$sortingComponent = new SortingComponent(new InsertionSort());
echo $sortingComponent->sortList($list);
