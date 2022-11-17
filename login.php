<?php 
     $title= 'User Login';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';
     

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $username = strtolower(trim($_POST['username']));
          $password = $_POST['password'];
          $new_password = md5($password.$username);

          $result = $user->getUser($username, $new_password);
          if(!$result){
               echo'<div class= "alert alert-danger"> Username or Password is Incorrect! Please try again.</div>';
          }else {
               $_SESSION['username'] = $username;
               $_SESSION['id'] = $result['id'];
               header("Location: viewrecords.php");
          }


     }

?>


<h1 class= "text-center"><?php echo $title ?></h1>

<div class= "row">
            <div class = "col-lg-6 m-auto">
                 <div class = "card bg-light mt-5">
                     <div class = "card-title bg-primary text-white mt-5">

        </div>

        <h4 class="display-5 text-center py-2">Login</h4>
<form action= "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
     <table class="table table-sm">
          <tr>
               <td><label for="username" >Username: *</label></td>
               <td><input type="text" name= "username" class="form-control" id="username" 
               value ="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username']; ?>">
               </td>
          
          <tr>
               <td><label for="inputPassword3">Password: *</label></td>
               <td><input type="password" name= "password" class="form-control" id="password"></td>
     </table><br/><br/>
          <input type= "submit" value= "Login" class= "btn btn-success btn-block"> <br/>
          <a href = "#">Forgot Password</a>
     
 
</form><br/><br/><br/>

<?php require_once 'includes/footer.php'; ?>