<html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap JS Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       <!-- Custom Css -->   
   <link rel="stylesheet" href="../css/main.css">

    <!-- Vue 3: development -->
    <script src="https://unpkg.com/vue@next"></script>
   
   
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   
    
    <!-- Favicon logo -->
    <link rel="shortcut icon" type="image/jpg" href="../photos/faviconbook.png">

    <title>StudySite</title>

   
</head>
<body data-spy="scroll" data-target="#navbar">
  <nav id="top-navbar" class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
    <div class="container-fluid">
    <div class="collapse navbar-collapse justify-content-end">

    

    <ul class="navbar-nav">
        <li class="nav-item">
            <!-- TODO: ADD HREF ID TO HOME HERE! -->
            <a  class="nav-link" href="#home">Home</a>
        </li>

        <li class="nav-item">
            <!-- TODO: ADD HREF ID TO ABOUT HERE! -->
            <a class="nav-link" href="#about">About</a>
        </li>

        <li class="nav-item">
            <!-- TODO: ADD HREF ID TO CONTACT HERE! -->
            <a class="nav-link" href="#contact">Contact</a>
        </li>

        <li class="nav-item">
            <!-- TODO: ADD HREF ID TO LOGIN HERE! -->
            <a class="nav-link" href="#login">Login</a>
        </li>    


    </ul>

    </div>

    </div>


</nav>




     <!-- START Top Header -->
     <div class="top-header" > 
      <div class="text-center ">
          <a class="navbar-brand " href="../index.html">StudySite
                  <small class="text-dark ">
                      Notes for Everyone!
                  </small>                      
              </a>
      </div>
  </div>
  <!-- END  Top Header -->


  <!-- START NavBar -->

  <!-- TODO: Add CSS class to navbar text etc -->
  <nav id="navbar" class="navbar sticky-top navbar-dark bg-success navbar-expand-md">
      <!-- collapsible nav bar -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#the-nav" aria-controls="the-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="the-nav">
          <ul class="navbar-nav m-auto">
            
              <li class="nav-item">
                  <!-- TODO: ADD HREF ID TO Forum HERE! -->
                  <a class="nav-link" href="#market">Marketplace</a>
              </li> 
              

              <li class="nav-item">
                  <!-- TODO: ADD HREF ID TO GAMES HERE! -->
                  <a class="nav-link" href="../games.html">Games</a>
              </li>                  
              
              <li class="nav-item">
                  <!-- TODO: ADD HREF ID TO Forum HERE! -->
                  <a class="nav-link" href="../forum/forum3.php">Forum</a>
              </li>        
          </ul>                
      </div>   
  </nav>
   <!-- End NavBar -->
   <div>
   <?php  

$user_id = $_GET['username'];
$user_id_no = $_GET['id'];
$reply = $_GET['reply'];
// var_dump($user_id);
// var_dump($user_id_no);
// var_dump($reply);


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "forum_pages";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO replies (id, username, reply)
VALUES ('$user_id_no', '$user_id', '$reply')";
//var_dump($conn->query($sql));

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully"."<br>". "<br>" ."Click ".
  "<a class='btn btn-success' href='forum3.php' role='button'>here</a>"." to return to Message board!";;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
   </div>


        

    <?php 
    if(isset($_POST['reply'])) {
        $thread = $_POST['name'];
    }
    ?>



    <!-- <div class="container" style="margin-top: 50px; display: none;" id="new" >
        <div class="row" id="app">  
            <div class="col">
                <form style="text-align: center;" action="insertData.php" method="get">
                    <div class="form-group">
                      <span style="font-weight: bold;">username :</span>
                      <input type="text" name="username" style="margin-bottom: 20px;" v-model="username">
                      <br>
                      <span style="font-weight: bold;">Thread Name:</span>
                      <input type="text" name="threadName" style="margin-bottom: 20px; width: 50px;" v-model="threadName" >
                      <br>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: bold;">Description :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" v-model="content"></textarea>
                      </div>
                      <br>  
                      <label for="exampleFormControlFile1" style="font-weight: bold;">Upload images here:</label>
                      <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" style="margin-top: 30px;" v-on:click="insertData()">Submit</button>
                  </form>
              </div>
          </div>


    </div> -->

    <script>
      Vue.createApp({
          data() {
              return {
                  threads: [] // array of post objects
              }
          },
          created() { // created is a hook that executes as soon as Vue instance is created
              axios.get('http://localhost/IS216/WAD2-G7T2/forum/database/getPosts.php')
              .then(response => {
                  // this gets the data, which is an array, and pass the data to Vue instance's posts property
                  this.threads = response.data
              })
              .catch(error => {
                  this.threads = [{ entry: 'There was an error: ' + error.message }]
              })
          }
      }).mount('#app')
  </script>
    

    <script src="forum.js"></script>
    <script src="vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            
</html>

