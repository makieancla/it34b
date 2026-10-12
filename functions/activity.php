<?php
    function LogActivity($pdo,$user_id,$user_email,$action, $status='success') {
       try{
            //Get Client IP Address
            $ip = $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
         
         
            if(strpos($ip,',') !== false){
                $ip = explode(',', $ip)[0];


            }


            //Get User Agent
            $user_agent =  substr($_SERVER['HTTP_USER_AGENT'] ?? 'unknown', 0, 255);

            //apllication Query
            $stmt = $pdo -> prepare("
            INSERT INTO activity_logs(
                user_id,
                user_email,
                activity_log_action,
                activity_log_status,
                activity_log_ip_address,
                activity_log_user_agent
            ) VALUES (?,?,?,?,?,?)
            ");
           
                $success = $stmt->execute([
                $user_id,
                $user_email,
                $action,
                $status,
                $ip,
                $user_agent
            ]);

                return $success;

       } catch(PDOException $e){

           error_log("Activity Log Error: " . $e->getMessage());
           return false;
           }
    }


?>