<?php
namespace BookingApp\BookingApp\Bookings;

use BookingApp\BookingApp\Connection;
use PDOException;

class Booking extends Connection
{

    protected function getBooking(string $id) 
    {
        try {

            $sql = 'SELECT * FROM bookings WHERE booking_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);


            $result = $stmt->fetch();

            return $result;
        } catch (PDOException $e) {

            echo 'Erro: ' . $e->getMessage();
        }
        $stmt = null;

    }

    /***
     *  TODO: validate inputs
     * 
     */
    protected function addBooking(
        $booking_id,
        $booking_date,
        $booking_time,
        $booking_status,
        $firstname,
        $lastname,
        $email,
        $phone_number,
        $user_location,
    ) {
        try {
            $sql = 'INSERT INTO bookings 
            (booking_id, booking_date, booking_time, booking_status, firstname, 
            lastname, email, phone, user_location) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([
                $booking_id, $booking_date, $booking_time, $booking_status,
                $firstname, $lastname, $email, $phone_number, $user_location
            ]);
            $result = true;

        } catch (PDOException $e) {
            
            echo "Error: ". $e->getMessage();
        }
        
        $stmt = null;

        return $result;
    }
}
