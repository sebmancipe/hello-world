<?php

/**
 * This model represents a Cooker
 */
class Cooker {
    public function getName(): string
    {
        return $this->name;
    }

    public function getRaiting(): int
    {
        return $this->raiting;
    }

    /**
     * This function is unused but we'll probably use it in the future
     */
    public function getNameAndRaiting(): string
    {
        return $this->getName() . ' ' . $this->getRaiting();
    }

    /**
     * Creates a Cooker entity with name and raiting
     */
    public function __construct(string $name, Raiting $raiting) {
        $this->name = $name;
        $this->raiting = $raiting;
    }
}