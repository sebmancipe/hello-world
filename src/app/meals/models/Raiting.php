<?php

class Raiting {
    public function __construct(int $current, int $total) {
        $this->current = $current;
        $this->total = $total;
    }

    public function getRaitingFormatted(): string
    {
        if($this->current > 12){
            return sprintf('%s', $this->current) . '/' . $this->total;
        }
        
        return $this->current . '/' . $this->total;
    }
}