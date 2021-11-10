<?php
    include 'conn.php';
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page-1) * $limit;

    $result1 = $conn->query("SELECT count(id) AS id FROM threads ");
    $threadCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $threadCount[0]['id'];
    $pages = ceil($total / $limit);
    

?>

<?php
    require_once './database/model/Post.php';
    require_once './database/model/PostDAO.php';
    require_once './database/model/ConnectionManager.php';

?>

<!DOCTYPE html>
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

        <div class="row" style=" justify-content: left; padding-top: 0px; padding-left: 20px; font-size: 70px; background-image: url(../web/photos/Books.jpg);">
            <div class="col-12">Message Board</div>
            <div class="col-auto" style="padding-right: 2px;">
                <a href="../index.html" style="color: black; text-decoration: none; font-size: medium;">
                    <p>Home</p></a>
            </div>

            <div class="col-auto" style="padding-left: 2px; padding-right: 2px; font-size: medium; margin-left: 0;">
                <p>></p>
            </div>

            <div class="col-auto" style="padding-left: 2px; padding-right: 2px;">
                <a href="./forum2.html" style="color: black; text-decoration: underline; font-size: medium;" id="forum">
                    <p>Forum</p>
                </a>
            </div>

            <div class="col-auto" style="padding-left: 2px; padding-right: 2px; font-size: medium; margin-left: 0; display: none;" id="hide4">
              <p>></p>
            </div>

            <div class="col-auto" style="padding-left: 2px; padding-right: 2px;">
              <a href="./forum2.html" style="color: black; text-decoration: underline; font-size: medium;" id="forum">
                  <p id="currentPosition"></p>
              </a>
            </div>

        
            
            
        </div>


        <div class="row" style="padding-left:20px ; padding-top: 20px;">
            <div class="col-10">
                <div class="dropdown" id='hide1'>
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="categorydownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </button>
                    <div class="dropdown-menu" aria-labelledby="categorydownMenuButton">
                      <a class="dropdown-item" href="#" onclick="haziq()">Haziq</a>
                      <a class="dropdown-item" href="#">Soon Ann</a>
                      <a class="dropdown-item" href="#">DaiWei</a>
                    </div>
                </div>
            </div>
            <div class="col-2" id="hide3">
              <a href="add_thread.php">
                <button class="btn btn-primary" onclick="return showThread()">New Thread</button>
              </a>
            </div> 
        </div>

        <div id="app" style="padding-left: 20px;">    
          <h4 style="padding-top: 10px"> Thread Posts </h4> 
          <table class="table table-striped" style="padding-left: 40px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Thread Name</th>
                    <th>Content</th>
                    <th>Reply</th>
                </tr>
            </thead>
                      
            <tbody>
                <?php
                $dao = new POSTDAO();
                $posts = $dao->getAll();
                foreach($posts as $post) {
                    echo "
                        <tr>
                            <td>{$post->getID()}</td>
                            <td>{$post->getDate()}</td>
                            <td>{$post->getUsername()}</td>
                            <td>
                            <a href='replies.php?name={$post->getThreadName()}&id={$post->getID()}'>{$post->getThreadName()}</a>
                            
                            </td>
                                
                            <td>{$post->getContent()}</td>
                            <td>
                            <a class='btn btn-success' href='add_reply.php?id={$post->getThreadName()}'>Reply</a>
                            </td>

                        </tr>
                        
                    ";
                    //var_dump($post);
                }
                ?>
            </tbody>
                
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

        <nav aria-label="Page navigation example" class="d-flex justify-content-center" >
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="forum3.php?page=<?= $previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>
                    <?php for($i =1; $i<= $pages; $i++) : ?>
                    <li class="page-item"><a  class="page-link" href="forum3.php?page=<?=$i;?>"><?=$i;?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="forum3.php?page=<?= $next; ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                </ul>
        </nav>




  
        <script src="forum.js"></script>
        <script src="vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        


        <!--<script src="https://unpkg.com/vue@next"></script>-->
        <script src="forum.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>