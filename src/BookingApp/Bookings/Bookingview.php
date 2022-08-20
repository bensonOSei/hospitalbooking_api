<?php

namespace BookingApp\BookingApp\Bookings;

class BookingView extends Booking {
    
    public function __construct(private $id){}

    public function trackBooking(){
        $result = $this->getBooking($this->id);
        return $result;
    }
    
}
