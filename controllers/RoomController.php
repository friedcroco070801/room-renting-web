<?php
    namespace Controllers;
    require_once('models/Room.php');

    class RoomController {
        public function loadRooms() {
            $Room = 'Models\\Room';
            
            // echo $type;
            echo nl2br("\nloadRooms");

            echo json_encode();
        }

        public function loadRoom() {
            $Room = 'Models\\Room';
            // echo $id;
            echo nl2br("\nloadRoom");
        }

        public function uploadRoom() {
            $Room = 'Models\\Room';

            $request_body = json_decode(file_get_contents('php://input'), true);
            echo nl2br("\nuploadRoom");
        }
    }
?>