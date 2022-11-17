   
<?php 
     $title= 'Index';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';

     //Get Specialties
     $results = $crud->getSpecialties();
?>

    <h1 class="text-center" >Springfield College Registration Form</h1>
     
    <div class= "row">
            <div class = "col-lg-6 m-auto">
                 <div class = "card bg-light mt-5">
                     <div class = "card-title bg-primary text-white mt-5">

        </div>
        <h4 class="display-5 text-center py-2">Sign-Up</h4>
    <div class= "card-body">
        
        <form method="post" action ="success.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputfirstname">First Name</label>
                    <input required type="text" class="form-control" id="firstname" placeholder="Please Enter First Name" name="firstname">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputlastname">Last Name</label>
                    <input required type="text" class="form-control" id="lastname" placeholder="Please Enter Last Name" name="lastname">
                </div>
            </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="text" class="form-control" id="dob" placeholder="Please Select DOB" name="dob">
                </div>
                <div class="form-group">
                        <label for="SelectSpecialty">Courses</label>
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="specialty" name="specialty">
                            <?php while ($r = $results ->fetch (PDO::FETCH_ASSOC)) {?>
                                <option value= "<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>

                            <?php }?>
                        </select>
                </div>
            
                <div class="form-group">
                    <label for="inputEmail4">Email Address</label>
                    <input required type="email" class="form-control" id="email" placeholder="Enter Email Here"name="email">
                    <small id="emailHelp" class="form-text text-muted"> We will never share your Email with anyone else.</small>
                </div>
                <div class="form-group">
                        <label for="phone">Contact Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number Here"name="phone">
                        <small id="phoneHelp" class="form-text text-muted"> We will never share your number with anyone else.</small>
                </div>
                
                <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
                        <label class="custom-file-label" for = "avatar" >Choose Image</label>
                        <small id="avatar" class="form-text text-warning"> File uploading is Optional</small>
                        
                </div>
        
            

    
        <br>
        <button type="Register" name="Register" class="btn btn-success btn-block">Register</button>
    
        </form>
    </div>
    
<br>
<br>
<?php require_once 'includes/footer.php'; ?>