<?php

class DeliveryService {
    public function __construct(WhatsAppNotifier $notifier){
        $this->notifier = $notifier;
    }

    public function deliver(Meal $meal): void
    {
        $rf = $meal->getCooker()->getRaiting()->getRaitingFormatted();
        
        $notifier->notify($meal);

        $meal->setAsDelivered(true);
    }
}