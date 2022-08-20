<?php

namespace BookingApp\BookingApp\Bookings;

class BookingCtr extends Booking
{
    public function __construct(
        private $booking_date,
        private $booking_time,
        private $firstname,
        private $lastname,
        private $email,
        private $phone_number,
        private $user_location,
    ) {
    }

    public function bookAppointment()
    {
        //todo: validate inputs

        $id = uniqid("BKI-");
        $status = "Active";

        if ($this->addBooking(
            $id,
            $this->booking_date,
            $this->booking_time,
            $status,
            $this->firstname,
            $this->lastname,
            $this->email,
            $this->phone_number,
            $this->user_location,
        )) {
            return $this->getBooking($id);

        } else {
            return false;
        }
    }
}
