<?php
class Product
{
    public $name;
    public $quantity;
    public $price;
    public $discount;

    public function __construct($name, $quantity, $price, $discount = 0)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->discount = $discount;
    }

    public function applyDiscount()
    {
        $this->price -= $this->price * $this->discount;
    }
}

class Basket
{
    public $items = [];

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function calculateTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->quantity * $item->price;
        }
        return $totalPrice;
    }

    public function calculateTax()
    {
        $totalPrice = $this->calculateTotalPrice();
        $fruitTax = 0;
        $wineTax = 0;

        foreach ($this->items as $item) {
            $itemTotal = $item->quantity * $item->price;
            if ($item->name == 'Wine') {
                $wineTax += $itemTotal * 0.21;
            } else {
                $fruitTax += $itemTotal * 0.06;
            }
        }

        return ['fruitTax' => $fruitTax, 'wineTax' => $wineTax];
    }

    public function applyFruitDiscount()
    {
        foreach ($this->items as $item) {
            if ($item->name != 'Wine') {
                $item->applyDiscount();
            }
        }
    }
}

$banana = new Product('Bananas', 6, 1, 0.5);
$apple = new Product('Apples', 3, 1.5, 0.5);
$wine = new Product('Wine', 2, 10);

$basket = new Basket();
$basket->addItem($banana);
$basket->addItem($apple);
$basket->addItem($wine);

$totalPriceWithoutDiscount = $basket->calculateTotalPrice();
$basket->applyFruitDiscount();
$totalPriceWithDiscount = $basket->calculateTotalPrice();
$taxes = $basket->calculateTax();

echo "Total Price (without discount): €{$totalPriceWithoutDiscount}\n";
echo "<br>";
echo "Total Price (with discount): €{$totalPriceWithDiscount}\n";
echo "<br>";
?>