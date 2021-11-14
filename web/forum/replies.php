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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   
    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   
    
    <!-- Favicon logo -->
    <link rel="shortcut icon" type="image/jpg" href="../photos/faviconbook.png">


    <!-- JS script for Likes Button -->
    <script type="text/javascript">
      function fetch_select(val) {
        $.ajax({
        type: 'post',
        url: 'getLikes.php',
        data: {
        get_option:val
        },
        success: function (response) {
            console.log(response);
        document.getElementById(val).innerHTML=response; 
        }
        });
        
      }
    </script>

    <!-- JS script for Dislike Button -->
    <script type="text/javascript">
      function fetch_select_two(val) {
        $.ajax({
        type: 'post',
        url: 'getDislikes.php',
        data: {
        get_option:val
        },
        success: function (response) {
            console.log(response);
        document.getElementById(val).innerHTML=response; 
        }
        });
        
      }
    </script>
 
</head>
<body>
<body style="background-image: url(../marketplace/img/background.png); background-size: cover;" data-spy="scroll" data-target="#navbar">
<nav id="top-navbar" class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="../index.html" style="padding-left: 8px;">
                <img src="../photos/faviconbook.png" alt="" width="30" height="24">
                STUDYSITE
            </a>

            <!-- <div class="collapse navbar-collapse justify-content-end" v-if='user'>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./marketplace.html"> Marketplace</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../forum/forum3.php">Forum</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../games.html">Games</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../notes/notes.php">Notes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{user.first_name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href='../../login page/profile.html'>Profile</a></li>
                            <li><button v-on:click='doLogout' class="btn">Logout</button></li>
                        </ul>
                    </li>

                </ul>
            </div> -->

            <div class="collapse navbar-collapse justify-content-end" v-else>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../marketplace/marketplace.html"> Marketplace</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="../forum/forum3.php">Forum</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="../games.html">Games</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="../notes/notes.php">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../login page/login.html">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn rounded-pill bg-primary" href="../../login page/register.html">Register</a>
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
        <table class="table table-striped table-secondary table-hover col-xs-3" style="padding-left: 40px;">
          <thead>
            <tr>
              <th>ID</th>
              <th>Reply ID</th>
              <th>Likes Count</th>
              <th>Date</th>
              <th>Username</th>
              <th>Reply</th>  
              <th></th>  
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
                  <td id='{$post->getRID()}'>{$post->getLikes()}</td>
                  <td>{$post->getDate()}</td>
                  <td>{$post->getUsername()}</td>
                  <td>{$post->getReply()}</td>
                  <td>
                    <button class='btn btn-success' onclick='fetch_select({$post->getRID()})'>Like</button>
                  </td>
                  <td>
                    <button class='btn btn-danger' onclick='fetch_select_two({$post->getRID()})'>Dislike</button>
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

  

    <!--<script src="https://unpkg.com/vue@next"></script>-->
    <script src="vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    
</body>
</html>