<?php
include "db_config.php";
class user
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                exit;
            }
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
                $_SESSION['type'] = $user_data['type'];
                return true;
            } else {
                return false;
            }
    }

    public function reg_user($name, $username, $password, $email)
    {
        //$password=md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND pwd='$password'";
        $check = $this->db->query($sql);
        $count_row = $check->num_rows;
        if ($count_row == 0) {
                $sql1 = "INSERT INTO users SET username='$username', pwd='$password'";
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
	
	public function get_user_details($username)
    {
        $sql1 = "SELECT * FROM users WHERE username='$username'";
        $result1 = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
		$row = mysqli_fetch_array($result1);
        if($row['type']==1)
        {
			$sql = "SELECT * FROM student_view WHERE s_id='$username'";
			$result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
        }
        if($row['type']==2)
        {
			$sql = "SELECT * FROM teacher_view WHERE t_id='$username'";
			$result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
        }
        if($row['type']==3)
        {
			$result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		}
		return $result;
	}
	
	public function change_pwd_s($uid,$old,$new,$cnf_new)
	{
		$sql="SELECT s_pwd FROM students WHERE s_id ='$uid'";
		$result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		$row = mysqli_fetch_array($result);
      	if(!$result)
      	{
         	echo "The username you entered does not exist";
      	}
      	else if($old!= $row['s_pwd'])
      	{
      		echo "Old password is incorrect";
		}
		else
		{
      		if($new==$cnf_new){
			 	$sql1="UPDATE students SET s_pwd ='$new' where s_id='$uid'";
			 	$result1=mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");	
				if($result1)
         		{
					echo "Congratulations You have successfully changed your password";
					echo "<script>location = 'student.php'</script>";
         		}
      		}
     		else
      		{
     			echo "Passwords do not match";
     		}
		}
	}

	public function change_pwd_t($uid,$old,$new,$cnf_new)
	{
		$sql="SELECT t_pwd FROM teacher WHERE t_id ='$uid'";
		$result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		$row = mysqli_fetch_array($result);
      	if(!$result)
      	{
         	echo "The username you entered does not exist";
      	}
      	else if($old!= $row['t_pwd'])
      	{
      		echo "Old password is incorrect";
		}
		else
		{
      		if($new==$cnf_new){
			 	$sql1="UPDATE teacher SET t_pwd ='$new' where t_id='$uid'";
			 	$result1=mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");	
				if($result1)
         		{
					echo "Congratulations You have successfully changed your password";
					echo "<script>location = 'teacher.php'</script>";
         		}
      		}
     		else
      		{
     			echo "Passwords do not match";
     		}
		}
	}

    public function get_user_category($username)
    {
        $sql = "SELECT type FROM users WHERE username='$username'";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
        if($row['type']==1)
        {
            return 'students';
        }
        if($row['type']==2)
        {
            return 'teacher';
        }
        if($row['type']==3)
        {
            return 'admin';
        }
    }
	
	public function get_teacher_details()
    {
        $sql = "SELECT * FROM teacher_view ";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
        return $result;
    }

    public function add_teacher($id, $name, $email, $subject, $pwd)
    {
        $sql1="INSERT INTO teacher SET t_id='$id', t_name='$name', t_email='$email',subject='$subject', t_pwd='$pwd'";
        $result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        $sql2 = "INSERT INTO users SET username='$id', pwd='$pwd',type=2";                 
        $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
        return $result1 and $result2;
    }

	public function del_teacher($id)
    {
        $sql1="DELETE from `teacher` where t_id='$id'";
        $result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot removed");
        $sql2="DELETE from `users` where username='$id'";                 
        $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot removed");
        return $result1 and $result2;
	}
	
	public function edit_teachers($uid,$id,$name,$email)
	{
		$sql1="UPDATE `teacher` SET `t_id` = '$id', `t_name` = '$name', `t_email` = '$email' WHERE `teacher`.`t_id` = '$uid'";
        $result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot edited");
        if($result1){
		   $sql2="UPDATE `users` SET `username` = '$id' WHERE `users`.`username` = '$uid'";
		   $_SESSION['username']=$id;
           $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot edited");
		}
		return $result1 and $result2;
	}

    public function get_student_details()
    {
        $sql = "SELECT * FROM student_view";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
        return $result;
        
	}
	
	public function add_student($id, $name, $email, $pwd)
    {
        $sql1="INSERT INTO students SET s_id='$id', s_name='$name', s_email='$email', s_pwd='$pwd'";
		$result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
		if(!$result1){
			$_SESSION['error']  = myqli_sqlstate($this->db);
			return false;
		}
		$sql2 = "INSERT INTO users SET username='$id', pwd='$pwd',type=1";                 
        $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
        return $result1 and $result2;
		
	}

    public function del_student($id)
    {
        $sql1="DELETE from `students` where s_id='$id'";
        $result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot removed");
        $sql2="DELETE from `users` where username='$id'";                 
        $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot removed");
        return $result1 and $result2;
    }

	public function edit_students($uid,$id,$name,$email,$dob)
	{
		$sql1="UPDATE `students` SET `s_id` = '$id', `s_name` = '$name', `s_email` = '$email', `dob` = '$dob' WHERE `students`.`s_id` = '$uid'";
        $result1= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot edited");
        if($result1){
		   $sql2="UPDATE `users` SET `username` = '$id' WHERE `users`.`username` = '$uid'";
		   $_SESSION['username']=$id;
           $result2= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot edited");
		}
		return $result1 and $result2;
	}



	public function check_answer($subject,$qid,$choice)
    {
        if($subject=="maths")
        $sql = "SELECT * FROM maths where q_id='$qid' and answer='$choice'";

        if($subject=="english")
        $sql = "SELECT * FROM english where q_id='$qid' and answer='$choice'";

        if($subject=="science")
        $sql = "SELECT * FROM science where q_id='$qid' and answer='$choice'";

        $result = mysqli_query($this->db, $sql);
        $count_row = $result->num_rows;
        if ($count_row == 1)
            return 1;
        else
            return 0;
    }
	
	public function get_marks($subject)
    {
        if($subject=="maths")
        $sql = "select sum(marks) from maths,temp where q_id=qid and flag=1";

        if($subject=="english")
        $sql = "select sum(marks) from english,temp where q_id=qid and flag=1";

        if($subject=="science")
        $sql = "select sum(marks) from science,temp where q_id=qid and flag=1";


        $result = mysqli_query($this->db,$sql);
        $marks = mysqli_fetch_assoc($result);
        return $marks['sum(marks)'];

    }

    public function get_totalmarks($subject)
    {
        if($subject=="maths")
        $sql = "select sum(marks) from maths,temp where q_id=qid";

        if($subject=="english")
        $sql = "select sum(marks) from english,temp where q_id=qid";

        if($subject=="science")
        $sql = "select sum(marks) from science,temp where q_id=qid";
        $result = mysqli_query($this->db,$sql);
        $marks = mysqli_fetch_assoc($result);
        return $marks['sum(marks)'];
    }

    public function submit_answer($subject,$count,$qid,$selected)
    {
        $user = new User();
        $ans=$user->check_answer($subject,$qid,$selected);
        $sql = "INSERT into temp(count,qid,response,flag) values('$count','$qid','$selected','$ans')";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() ."dcsddData cannot inserted");
        
        return $result;    

    }

	public function get_student_marks_aboveAverage($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view where percent>(SELECT AVG(percent) as percent from maths_view) ORDER BY percent";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view where percent>(SELECT AVG(percent) as percent from science_view) ORDER BY percent";
		}
		else
		{
			$sql="SELECT * from english_view where percent>(SELECT AVG(percent) as percent from english_view) ORDER BY percent";
		}
		$result1=mysqli_query($this->db,$sql);
		return $result1;
	}
	
	public function get_student_marks_belowAverage($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view where percent<=(SELECT AVG(percent) as percent from maths_view) ORDER BY percent";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view where percent<=(SELECT AVG(percent) as percent from science_view) ORDER BY percent";
		}
		else
		{
			$sql="SELECT * from english_view where percent<=(SELECT AVG(percent) as percent from english_view) ORDER BY percent";
		}
		$result1=mysqli_query($this->db,$sql);
		return $result1;
	}
	
	public function get_student_maxmarks($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view where percent=(SELECT MAX(percent) as percent from maths_view)";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view where percent=(SELECT MAX(percent) as percent from science_view)";
		}
		else
		{
			$sql="SELECT * from english_view where percent=(SELECT MAX(percent) as percent from english_view)";
		}
		$result1=mysqli_query($this->db,$sql);
		return $result1;
	}
	
	public function get_student_minmarks($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view where percent=(SELECT MIN(percent) as percent from maths_view)";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view where percent=(SELECT MIN(percent) as percent from science_view)";
		}
		else
		{
			$sql="SELECT * from english_view where percent=(SELECT MIN(percent) as percent from english_view)";
		}
		$result1=mysqli_query($this->db,$sql);
		return $result1;
	}
	
	public function get_average($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT ROUND(AVG(percent),2) as percent from maths_view";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT ROUND(AVG(percent),2) as percent from science_view";
		}
		else
		{
			$sql="SELECT ROUND(AVG(percent),2) as percent from english_view";
		}
		$result1=mysqli_query($this->db,$sql);
		return $result1;
	}
	
	public function get_student_marks($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view ORDER BY percent";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view ORDER BY percent";
		}
		else
		{
			$sql="SELECT * from english_view ORDER BY percent";
		}
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}

	public function get_particular_student_marks($user)
	{
		$sql="SELECT * from result where u_id='$user'";
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}
	
	public function get_particular_student_marks_maths($user)
	{
		$sql="SELECT * from maths_view where s_id='$user'";
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}
	
	public function get_particular_student_marks_english($user)
	{
		$sql="SELECT * from english_view where s_id='$user'";
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}
	
	public function get_particular_student_marks_science($user)
	{
		$sql="SELECT * from science_view where s_id='$user'";
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}
	
	public function get_question($subject,$diff)
    {
        if($subject=="maths")
        $sql = "select * from maths where q_id not in(select qid from temp) and value='$diff' ORDER BY RAND() LIMIT 1";

        if($subject=="english")
        $sql = "select * from english where q_id not in(select qid from temp) and value='$diff' ORDER BY RAND() LIMIT 1";

        if($subject=="science")
        $sql = "select * from science where q_id not in(select qid from temp) and value='$diff' ORDER BY RAND() LIMIT 1";

        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Error Bitches");
        return $result;
    }

    public function get_results($subject)
    {
        if($subject=="maths")
        $sql = "select * from maths,temp where q_id=qid";
        
        if($subject=="english")
        $sql = "select * from english,temp where q_id=qid";

        if($subject=="science")
        $sql = "select * from science,temp where q_id=qid";
        
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Error Bitches");
        return $result;


    }
	
	public function insert_records($username,$subject,$marks,$tmarks)
    {
        $sql="INSERT INTO result (u_id,subject,marks,total) values('$username','$subject','$marks','$tmarks')";
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "Data cannot inserted");
        return $result;
    }

    
    public function clear_temp()
    {
        $sql = "truncate table temp";
		$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno() . "Temp cannot be deleted");
		return $result;
    }

    public function insert_qr($count,$qid)
    {
        $sql ="insert into temp (count,qid,response) values('$count','$qid','')";
       
        $result = mysqli_query($this->db, $sql) or die(mysqli_connect_errno() . "sssssData cannot inserted");

        return $result;
        
    }

	
	public function get_question_details($user)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths ORDER BY value";
			$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
			return $result1;
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science ORDER BY value";
			$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
			return $result1;
		}
		else
		{
			$sql="SELECT * from english ORDER BY value";
			$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
			return $result1;
		}
	}
	
	public function get_specificStudent($user,$name)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
			$sql="SELECT * from maths_view where s_id LIKE '%".$name."%'";
		}
		else if($row['subject']=='science')
		{
			$sql="SELECT * from science_view where s_id LIKE '%".$name."%'";
		}
		else
		{
			$sql="SELECT * from english_view where s_id LIKE '%".$name."%'";
		}
		$result1=mysqli_query($this->db, $sql) or die(mysqli_connect_errno()." Error Bitches");
		return $result1;
	}
    
	public function get_query_details()
	{
		$sql="SELECT * from query";
		$result=mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Error Bitches");
		return $result;
	}

	
	public function add_question($user,$statement,$a,$b,$c,$d,$ans,$value,$marks)
	{
		$sql1="SELECT subject from teacher where t_id='$user'";
		$result = mysqli_query($this->db, $sql1) or die(mysqli_connect_errno()." Error Bitches");
        $row = mysqli_fetch_array($result);
		if($row['subject']=='maths')
		{
		$sql="INSERT INTO maths SET statement='$statement',a='$a',b='$b',c='$c',d='$d',value='$value',answer='$ans',marks='$marks'";
		}			
		else if($row['subject']=='science')
		{
		$sql="INSERT INTO science SET statement='$statement',a='$a',b='$b',c='$c',d='$d',value='$value',answer='$ans',marks='$marks'";
		}
		else
		{
		$sql="INSERT INTO english SET statement='$statement',a='$a',b='$b',c='$c',d='$d',value='$value',answer='$ans',marks='$marks'";
		}
		$result1=mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot be inserted");
		return $result1;
	}

	
	
	public function del_query($email)
	{
		$sql="DELETE from query where email='$email'";
		$result=mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot be removed");
		return $result;
	}
	
	public function del_question($id)
	{
		$sql="DELETE from maths where q_id='$id'";
		$result=mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot be removed");
		return $result;
	}


    public function check_answer1($choice)
    {
        $sql = "SELECT * FROM maths where answer='$choice'";
        $result = mysqli_query($this->db,$sql);
        $count_row = $result->num_rows;
        if($count_row==1)
            return true;
        else   
            return false;
    }

	public function get_query($name,$email,$query)
	{
		$sql="INSERT INTO `query`( `name`, `email`, `query`) VALUES ('$name','$email','$query')";
		$result=mysqli_query($this->db,$sql) or die(mysqli_connect_errno() . "Data cannot be inserted");
		return $result;
	}
}
 