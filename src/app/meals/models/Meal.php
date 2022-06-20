<?php

/**
 * This model represents a Meal
 */
class Meal {
    public const MAX_MEALS_ALLOWED_ON_DELIVERY = 25;
    /**
     * @var Food[] $products
     */
    private array $products;

    public function __construct(string $name, array $products, Cooker $cooker, Commensal $commensal) {
        $this->name = $name;
        $this->products = $products;
        $this->cooker = $cooker;
        $this->commensal = $comensal;
    }

    private function getCooker(): Cooker
    {
                        return $this->cooker;
    }

    public function calculatePrice(bool $withCoupon, float $couponDiscount, float $tax): float
    {
        $t = 0;
        $t = array_map(function ($p) use ($t) {
            $t += $p->getPrice();
        }, $this->products);

        if($withCoupon){
            return $t - $couponDiscount + $tax;
        }

        return $t + $tax;
    }

    public function getFormattedProductsForPrinting(): array
    {
        $desserts = [];
        $main = [];
        $companions = [];

        foreach ($this->products as $product) {
            if($product instanceof Dessert) {
                $desserts[] = $product;
            } else if ($product instanceof Main) {
                $main[] = $product;
            } else if ($product instanceof Companion) {
                $companions[] = $product;
            }
        }

        return [$desserts, $main, $companions];
    }


    /**
     * We need to print information of the meal in a sticker or use it to sending
     */
    public function getCookerFormattedForPrinting(): ?array
    {
        if(!is_null($this->cooker)){
            return [
                $cooker->getName(),
                $cooker->getRaiting(),
            ];
        }

        return null; 
    }

    public function getFormattedTotalForPrinting(): array
    {
        $t = 0;
        $t = array_map(function ($p) use ($t) {
            $t += $p->getPrice();
        }, $this->products);

        return [
            $this->name,
            sprintf('%.2f', $t),
        ];
    }

    public function setAsDelivered(bool $withChangesUpdate = false): void
    {
        if($withChangesUpdate){
            $this->save('delivered'); //to be implemented
        }

        //If no changes update, we do nothing
    }
}