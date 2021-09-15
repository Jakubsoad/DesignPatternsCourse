<?php



interface Departement
{
    public function accept(SalesReport $salesReport): string;
}

class FoodDepartment implements Departement
{
    public function accept(SalesReport $salesReport): string
    {
        return $salesReport->visitFoodDep($this);
    }
}

class FurnitureDepartment implements Departement
{
    public function accept(SalesReport $salesReport): string
    {
        return $salesReport->visitFurnitureDep($this);
    }
}

interface SalesReport
{
    public function visitFoodDep(FoodDepartment $department): string;
    public function visitFurnitureDep(FurnitureDepartment $department): string;
}

class SalesReportForDepartment implements SalesReport
{
    public function visitFoodDep(FoodDepartment $department): string
    {
        return 'Food Department report';
    }

    public function visitFurnitureDep(FurnitureDepartment $department): string
    {
        return 'Furniture Department report';
    }
}

$salesReport = new SalesReportForDepartment();
$foodDep = new FoodDepartment();
$furnitureDep = new FurnitureDepartment();

echo $foodDep->accept($salesReport);
echo PHP_EOL;
echo $furnitureDep->accept($salesReport);
