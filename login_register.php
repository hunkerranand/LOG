<?php
require ('connection.php');
if(isset($_POST['register']))
{
  $user_exist_query="SELECT * FROM 'registered_users' WHERE 'username'= '$_POST[username]' OR 'email'= '$_POST[email]'";
  $result =mysqli_query($con,$user_exist_query);
  if($result)
  {
    if(mysqli_num_rows($result)>0)
    {
      #if user has already taken usrename or email
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['username']==$_POST['username'])
      {
            #error for username already registred 
            echo"
              <script>
              alert('$result_fetch[username] -Username already taken');
              window.location.href= 'index.php';
              </script>
            ";
      }
      else
      {
        #error for email already taken
        echo"
         <script>
          alert ('$result_fetch[email]= E-mail already registered');
          window.location.href= 'index.php';
         </script>
        ";
      }
    }
    else
      {
        $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$_POST[password]')";
        if(mysqli_query($con,$query)) 
        {
          #if data inserted sucessfully
          echo"
          <script>
           alert('Registration sucessfull');
           windows.location.href='index.php';
          </script>
         ";
        }
        else
        {
           #if data cannot be inserted 
           echo"
            <script>
             alert('cannot be run Query');
             windowa.location.href='index.php';
            </script>
           ";
         }    
      }
    }
    else
    {
      echo"
       <script>
        alert('cannot run query');
        window.location.href= 'index.php';
       </script>
      ";
    }
    
  }


?>
