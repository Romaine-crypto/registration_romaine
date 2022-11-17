<?php 
     $title= 'Success';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';
     require_once 'sendemail.php';

     if (isset($_POST['Register'])){
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $contact = $_POST['phone'];
      $specialty = $_POST['specialty'];
      
      
      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = "$target_dir$contact.$ext";
      move_uploaded_file($orig_file, $destination);

     
      $isSuccess = $crud->insertAttendees($fname,$lname, $dob, $email, $contact, $specialty, $destination);
      $specialtyName = $crud->getSpecialtyById($specialty);

      if ($isSuccess){
          SendEmail::SendMail($email, 'Welcome to the Springfield College', 'You have been Registered sucessfully\'s ');

        echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
        include 'includes/successmessage.php';
      }
      else {
        
        include 'includes/errormessage.php';
      }

     }
?>
<img src= "<?php echo $destination; ?>" class = "rounded-cirlce" style= "width: 20%; height: 20%" />

<div class="card" style="width: 28rem;">
  <div class="card-body">
    <h5 class="card-title">
        <?php echo $_POST['firstname'] . ' '. $_POST['lastname']; ?>
     </h5>
    <h6 class="card-subtitle mb-2 text-muted">
    <?php echo $specialtyName['name']; ?>
    </h6>
    <p class="card-text">
        Date of Birth: <?php echo $_POST['dob']; ?>
    </p>
    <p class="card-text">
        Email Address: <?php echo $_POST['email']; ?>
    </p>
    <p class="card-text">
        Phone Number: <?php echo $_POST['phone']; ?>
    </p>
   
  </div>
</div>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>