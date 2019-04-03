<?php
include "db_config.php";
class user
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, 'cat');
        if (mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                exit;
            }
    }
    public function reg_user($name, $username, $password, $email)
    {
        //$password=md5($password);
        $sql = "SELECT * FROM manager WHERE uname='$username' OR uemail='$email'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;
        if ($count_row == 0) {
                $sql1 = "INSERT INTO manager SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
                $result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno() . "Data cannot inserted");
                return $result;
            } else {
                return false;
            }
    }

    public function get_session()
    {
        return $_SESSION['login'];
    }
    public function user_logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }


    public function get_details($username)
    {
        $sql = "SELECT * FROM student WHERE username='$username'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()."Error Bitches");
        return $result;
        
    }
    

    
    public function check_login($username, $password)
    {
        //$password=md5($password);
        $sql2 = "SELECT * from users WHERE username='$username' and pwd='$password'";
        $result = mysqli_query($this->db, $sql2);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['category'] = $user_data['category'];
                return true;
            } else {
                return false;
            }
    }

    public function check_answer($choice)
    {
        $sql = "SELECT * FROM maths where answer='$choice'";
        $result = mysqli_query($this->db,$sql);
        $count_row = $result->num_rows;
        if($count_row==1)
            return true;
        else   
            return false;
    }










    /* public function add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO room_category SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO rooms SET room_cat='$roomname', book='false'";
                        mysqli_query($this->db,$sql2);
                        
                    }
                
                    return $result;
                

            }*/

    /* public function check_available($checkin, $checkout)
            {
                
                
                   $sql="SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id
   FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin') )";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Query Doesnt run");;

                
                    return $check;
                

            }
            
            
            
            
            public function booknow($checkin, $checkout, $name, $phone,$roomname)
            {
                    
                    $sql="SELECT * FROM rooms WHERE room_cat='$roomname' AND (room_id NOT IN (SELECT DISTINCT room_id
   FROM rooms WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data herecannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
                        
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                    
                    
                
                    return $result;
                

            }
            
            
            
            
             public function edit_all_room($checkin, $checkout, $name, $phone,$id)
            {
                                
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    
                
                    return $result;
                

            }
            
            
            
            
            
             public function edit_room_cat($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat)
            {
                    
                 
                        $sql2="DELETE FROM rooms WHERE room_cat='$room_cat'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$room_qnty;$i++)
                        {
                            $sql3="INSERT INTO rooms SET room_cat='$roomname', book='false'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available=$room_qnty;
                        $booked=0;
                 
                        $sql="UPDATE room_category  SET roomname='$roomname', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE roomname='$room_cat'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
  
                    
                
                    return $result;
                

            }*/







}
 