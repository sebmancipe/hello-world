<?php

interface Food {
    public function isVegetable(): bool;

    public function isAnimal(): bool;

    public function isDessert(): bool;
}