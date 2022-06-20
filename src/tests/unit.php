<?php

/**
 * To execute tests:
 * 1. Build the project
 * 2. Set this file to be executed: chmod +x unit.php
 * 3. Be aware to configure php unit by default in your PC
 * 4. Execute phpunit --file unit.php
 * This has to be done in each time you would like to execute a test
 */
class Unit {

    //This only tests the happy path
    public function testMealCreated(): void
    {
        $cooker = new Cooker('Luana', new Raiting(1, 5));
        $meal = new Meal('arroz con pollo', [
            new Main(),
            new Companion(),
            new Dessert(),
        ], $cooker, new Commensal());

        $this->assertSame($cooker, $meal->getCooker());
    }
}