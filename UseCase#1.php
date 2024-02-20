<?php
$basket = [
    ['name' => 'Bananas', 'quantity' => 6, 'price' => 1],
    ['name' => 'Apples', 'quantity' => 3, 'price' => 1.5],
    ['name' => 'Wine', 'quantity' => 2, 'price' => 10]
];

$totalPrice = 0;
$fruitTax = 0;
$wineTax = 0;

foreach ($basket as $item) {
    $itemTotal = $item['quantity'] * $item['price'];
    $totalPrice += $itemTotal;

    // Calcul de la taxe en fonction du type d'article
    if ($item['name'] == 'Wine') {
        $wineTax += $itemTotal * 0.21;
    } else {
        $fruitTax += $itemTotal * 0.06;
    }
}

echo "Total Price: €{$totalPrice}\n";
echo "<br>";
echo "Tax on Fruits: €{$fruitTax}\n";
echo "<br>";
echo "Tax on Wine: €{$wineTax}\n";
echo "<br>";


//Avec classe
class Product
{
    public $name;
    public $quantity;
    public $price;

    public function __construct($name, $quantity, $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
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
            // Calcul de la taxe en fonction du type d'article
            if ($item->name == 'Wine') {
                $wineTax += $itemTotal * 0.21;
            } else {
                $fruitTax += $itemTotal * 0.06;
            }
        }

        return ['fruitTax' => $fruitTax, 'wineTax' => $wineTax];
    }
}

$banana = new Product('Bananas', 6, 1);
$apple = new Product('Apples', 3, 1.5);
$wine = new Product('Wine', 2, 10);

$basket = new Basket();
$basket->addItem($banana);
$basket->addItem($apple);
$basket->addItem($wine);

$totalPrice = $basket->calculateTotalPrice();
$taxes = $basket->calculateTax();

echo "Total Price: €{$totalPrice}\n";
echo "<br>";
echo "Tax on Fruits: €{$taxes['fruitTax']}\n";
echo "<br>";
echo "Tax on Wine: €{$taxes['wineTax']}\n";
echo "<br>";

?>