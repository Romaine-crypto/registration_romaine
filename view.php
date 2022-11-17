<?php 
     $title= 'View';
     require_once 'includes/header.php'; 
     require_once 'includes/auth_check.php';
     require_once 'db/conn.php';
     
     //Get Attendees by ID
     if(!isset($_GET['id'])){
        //echo "<h1 class = 'text-danger'> Please check dtails and try again</h1>";
        include 'includes/errormessage.php';
        

     }else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);

     
?>
<img src= "<?php echo empty ($result['avatar_path'])  ? "uploads/blank.jpg" : $result['avatar_path']; ?>" 
class = "rounded-cirlce" style= "width: 50%; height: 30%" />
    
    <div class="card border-primary mb-3" style="max-width: 440px;">
        <div class="row g-0">
            <div class="col-md-4">
           
            </div>
            <div class="col-md-8">
            <div class="card-body "><h5 class="card-title">Student Profile</h5>
                <?php echo $result['firstname'] . ' '. $result['lastname']; ?>
                <p class="card-text"><?php echo $result['name']; ?></p>
                
                <p class = "card-text">Date of Birth:<?php echo $result['dateofbirth']; ?>
                <p class="card-text">Email Address:<?php echo $result['emailaddress']; ?></p>
                <p class="card-text">Phone Number:<?php echo $result['contactnumber']; ?></p>
                <br>

                <div class="card-footer"><small class="text-muted">Last updated 3 mins ago</small></div>

            </div>
            </div>
        </div>
    </div>

            <a href= "viewrecords.php" class="btn btn-info">Back to List</a>
            <a href= "edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick ="return confirm ('Are you sure you want to Delete?');"
            href= "delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>

    <?php }?>

<br>
<br>
<?php require_once 'includes/footer.php'; ?>