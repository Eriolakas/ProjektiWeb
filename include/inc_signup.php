<?php
	
		include('db_con.php');
	
		$username =$_POST['username']; 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = sha1('password');
		//$role = $_POST['role'];
		// $password = 'user-input-pass';
		// $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        // $number    = preg_match('@[0-9]@', $password);
		// $specialChars = preg_match('@[^\w]@', $password);
		if(!empty($_POST['username']))
		{	if(!empty($_POST['name']))
			{
				if(!empty($_POST['email']))
				{
					if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						if(!empty($_POST['password']))
						{
						         $query = mysqli_query($conn,"SELECT * FROM signup WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysqli_error()); 
						         if(!$row = mysqli_fetch_array($query) or die(mysqli_error()))
						         {
							         $sql_insert = "INSERT INTO signup (username, name, email, password) VALUES ('$username', '$name', '$email ', '$password')";
							         $query=mysqli_query($conn, $sql_insert);
		
							      if($query)
							      {
								    echo '<script type="text/javascript">window.alert("You are succesfully registred now!")</script>';
								    header( "refresh:0; url=../Login.php" );
							      }else{
								     echo '<script type="text/javascript">window.alert("You are NOT succesfully registred!")</script>';
								     header( "refresh:10; url=../Signup.php" );
							      }
							     }else
							     {
							        echo '<script type="text/javascript">window.alert("You are NOT succesfully registred User exists!")</script>';
							        header( "refresh:0; url=../Signup.php" );
						         }
							// }else
							// {
							//     echo '<script type="text/javascript">window.alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character")</script>';
							// 	header( "refresh:0; url=../Signup.php" );
							// }	
					    }else{
						  echo '<script type="text/javascript">window.alert("You are NOT succesfully registred! ENTER THE PASSWORD")</script>';
						  header( "refresh:0; url=../Signup.php" );
						}
				    }else{
						echo '<script type="text/javascript">window.alert("INVALID EMAIL FORMAT Valid format: example@domain.com")</script>';
						header( "refresh:0; url=../Signup.php" );
					}
				}else{
					echo '<script type="text/javascript">window.alert("You are NOT succesfully registred! ENTER THE E-MAIL ADDRESS")</script>';
					header( "refresh:0; url=../Signup.php" );
				}
			}else{
				echo '<script type="text/javascript">window.alert("You are NOT succesfully registred! ENTER YOUR NAME")</script>';
				header( "refresh:0; url=../Signup.php" );
			}
		}else{
			echo '<script type="text/javascript">window.alert("You are NOT succesfully registred! ENTER USERNAME")</script>';
			header( "refresh:0; url=../Signup.php" );
		}
	
?>