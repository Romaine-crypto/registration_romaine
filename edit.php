   
<?php 
     $title= 'Edit Record';
     require_once 'includes/header.php'; 
     require_once 'includes/auth_check.php';
     require_once 'db/conn.php';

     //Get Specialties
     $results = $crud->getSpecialties();

     if(!isset($_GET['id']))
     {
        include 'includes/errormessage.php';
        header("location: viewrecords.php");
     }
     else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
     

?>

    <h1 class="text-center" >Edit Record</h1>

        <form method="post" action ="editpost.php">
            <input type = "hidden" name= "id" value = "<?php echo $attendee ['attendee_id'] ?>" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputfirstname">First Name</label>
                    <input type="text" class="form-control" value = "<?php echo $attendee ['firstname'] ?>" id="firstname"  name="firstname">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputlastname">Last Name</label>
                    <input type="text" class="form-control" value = "<?php echo $attendee ['lastname'] ?>" id="lastname"  name="lastname">
                </div>
            </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="text" class="form-control" value = "<?php echo $attendee ['dateofbirth'] ?>" id="dob"  name="dob">
                </div>
                <div class="form-group">
                        <label for="SelectSpecialty">Courses</label>
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="specialty" name="specialty">
                            <?php while ($r = $results ->fetch (PDO::FETCH_ASSOC)) {?>
                                <option value= "<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id']==
                                $attendee['specialty_id']) echo 'selected'?>>
                                <?php echo $r['name']; ?>
                            
                            </option>

                            <?php }?>
                        </select>
                </div>
            
                <div class="form-group">
                    <label for="inputEmail4">Email Address</label>
                    <input type="email" class="form-control" value = "<?php echo $attendee ['emailaddress'] ?>" id="email" name="email">
                    <small id="emailHelp" class="form-text text-muted"> We will never share your Email with anyone else.</small>
                </div>
                <div class="form-group">
                        <label for="phone">Contact Number</label>
                        <input type="text" class="form-control"value = "<?php echo $attendee ['contactnumber'] ?>" id="phone" name="phone">
                        <small id="phoneHelp" class="form-text text-muted"> We will never share your number with anyone else.</small>
                </div>
        
            

    
        <br>
        <a href= "viewrecords.php" class="btn btn-info">Back to List</a>
        <button type="Register" name="Register" class="btn btn-success">Save Changes</button>
    
    
    </form>

<?php }?>
    
<br>
<br>
<?php require_once 'includes/footer.php'; ?>