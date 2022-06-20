<?php

class WhatsAppNotifier {

    public function __construct($whatsappChannel){
        $this->whatsappChannel = $whatsappChannel;
    }

    public function notify(): void
    {
        if($this->whatsappChannel){
            //Data to be sent
        $for = $meal->commensal->getPhoneNumber();
        $message =  $rf . $meal->getFormattedTotalForPrinting();

        //Connection stablishing
        $this->whatsappChannel->openConnection('whatsapp.com/api/send-message');
        $this->whatsappChannel->connection->useSSL();
        $this->whatsappChannel->withBody($message);
        $this->whatsappChannel->setFrom('+1424523'); //This is our number
        
        //Send message
        $this->whatsappChannel->setTo($for);
        $this->whatsappChannel->send();

        //Flush
        $this->whatsappChannel->flushChannel();
        } else {
            $this->whatsappChannel = new Channel('whatsapp');

            $for = $meal->commensal->getPhoneNumber();
        $message =  $rf . $meal->getFormattedTotalForPrinting();

        //Connection stablishing
        $this->whatsappChannel->openConnection('whatsapp.com/api/send-message');
        $this->whatsappChannel->connection->useSSL();
        $this->whatsappChannel->withBody($message);
        $this->whatsappChannel->setFrom('+1424523'); //This is our number
        
        //Send message
        $this->whatsappChannel->setTo($for);
        $this->whatsappChannel->send();

        //Flush
        $this->whatsappChannel->flushChannel();
        }
    }
}