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
            // session_start();
            // $_SESSION['booking_id'] = $result['booking_id'];
            // $_SESSION['booking_date'] = $result['booking_Date'];
            // $_SESSION['booking_time'] = $result['booking_Time'];
            // $_SESSION['status'] = $result['booking_status'];
            // $_SESSION['firstname'] = $result['firstname'];
            // $_SESSION['lastname'] = $result['lastname'];
            // $_SESSION['email'] = $result['email'];
            // $_SESSION['phone_number'] = $result['phone'];
            // $_SESSION['user_location'] = $result['user_location'];
            // $_SESSION['date_created'] = $result['date_Created'];
            // $_SESSION['LAST_ACTIVITY'] = time();

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
        
        return $result;

        
        //$stmt = null;
        
    }
}
