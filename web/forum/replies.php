<?php 
    include 'conn.php';
    require_once './database/model/Post.php';
    require_once './database/model/PostDAO.php';
    require_once './database/model/ConnectionManager.php';
    $id = $_GET['id'];         
    $dao = new POSTDAO();
    $posts = $dao->get($id);
    //var_dump($posts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudySite</title>

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

    <script>
      $.ajax({
        type: "POST",
        url: "likes.php",
        data: { name: $("select[name='players']").val()},
        success:function( msg ) {
         alert( "Data Saved: " + msg );
        }
       });
    </script>
 


    

</head>
<body>
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
  <div class="top-header"> 
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
              <li class="nav-item">
                    <!-- TODO: ADD HREF ID TO Forum HERE! -->
                    <a class="nav-link" href="../notes/notes.php">Notes</a>
                </li>
          </ul>                
      </div>   
    </nav>
   <!-- End NavBar -->

    <div class="row" style=" justify-content: left; padding-top: 0px; padding-left: 20px; font-size: 70px; background-image: url(../web/photos/Books.jpg);">
      <div>
        <?php 
          $name = $_GET['name'];
          echo $name
        ?>
      </div>
            
      <div class="col-auto" style="padding-right: 2px;">
        <a href="../index.html" style="color: black; text-decoration: none; font-size: medium;">
          <p>Home</p>
        </a>
      </div>

      <div class="col-auto" style="padding-left: 2px; padding-right: 2px; font-size: medium; margin-left: 0;">
      <p>></p>
      </div>

      <div class="col-auto" style="padding-left: 2px; padding-right: 2px;">
        <a href="./forum3.php" style="color: black; text-decoration: none; font-size: medium;" id="forum">
          <p>Forum</p>
        </a>
      </div>

      <div class="col-auto" style="padding-left: 2px; padding-right: 2px; font-size: medium; margin-left: 0;">
        <p>></p>
      </div>

      <div class="col-auto" style="padding-left:2px; padding-right: 2px; font-size:medium; margin-left: 0;">
        <p>
          <u>
            <?php 
              $name = $_GET['name'];
              echo $name;
            ?>
          </u>
        </p>
      </div>
    </div>


    <div class="row" style="padding-left:20px ; padding-top: 10px;">
      <div class="col-auto">
      <?php
        //var_dump($_GET);
        $check_one = $_GET['id'];
        $check_two = $_GET['name'];
        //var_dump($check_one);
        echo "<a class='btn btn-success btn-lg' href='add_reply.php?id=$check_two&value=$check_one'>New Reply</a>"
      ?>
        <!--<button class="btn btn-success btn-lg">New Reply</button>-->
      
      </div>
    </div>


    <div id="app" style="padding-left: 20px; padding-right:20px">    
      <h4 style="padding-top: 10px"> Thread Posts </h4> 
        <table class="table table-striped" style="padding-left: 40px;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Reply ID</th>
              <th>Date</th>
              <th>Username</th>
              <th>Reply</th>  
              <th></th>  
            </tr>
          </thead>
                      
          <tbody>
            <?php 
              //var_dump($posts);
              foreach($posts as $post){
                
                echo "
                <tr>
                  <td>{$post->getID()}</td>
                  <td>{$post->getRID()}</td>
                  <td>{$post->getDate()}</td>
                  <td>{$post->getUsername()}</td>
                  <td>{$post->getReply()}</td>
                  <td>
                    <button class='btn btn-success' onclick='doThis({$post->getLikes()})'>Like</button>
                  </td>
                </tr>
              ";
              }
              //var_dump($id);
              
            ?>

          </tbody>
        </table>
    </div>


    <script>
      Vue.createApp({
        data() {
          return {
            replies: [] // array of post objects
          }
        },
        created() { // created is a hook that executes as soon as Vue instance is created
          axios.get('http://localhost/IS216/WAD2-G7T2/forum/replies_database/getReplies.php')
        .then(response => {
                  // this gets the data, which is an array, and pass the data to Vue instance's posts property 
          this.replies = response.data
          console.log(response.data);            
        })
        .catch(error => {
          this.replies = [{ entry: 'There was an error: ' + error.message }]
        })
        }
      }).mount('#app')
    </script>

    <script>
      function doThis($id) {
        //console.log($id)
        console.log($id)
        $id = Number($id);
        $id = $id + 1;
        console.log($id)
        document.getElementById("checking").innerHTML = $id;
        
      }
    </script>

    <!--<script src="https://unpkg.com/vue@next"></script>-->
    <script src="vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    
</body>
</html>