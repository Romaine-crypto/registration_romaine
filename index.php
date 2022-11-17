<?php 
     $title= 'Index';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';

     //Get Specialties
     $results = $crud->getSpecialties();
?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-blend-mode: multiply;
}

.hero-image {
  background-image: url("https://www.bankrate.com/2014/05/26174958/Reasons-to-go-to-college.jpg?auto=webp&optimize=high&crop=16:9");
  background-color: #cccccc;
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:80px">Springfield College</h1>
    <h3>We Welcome You</h3>
    
  </div>
</div>


</body>
</html>


<?php require_once 'includes/footer.php'; ?>