<?php
    include 'conn.php';
    // Pagination Pre-Sets
    $limit = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //var_dump($page);
    $start = ($page-1) * $limit;
    $result1 = $conn->query("SELECT count(id) AS id FROM threads ");
    $threadCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $threadCount[0]['id'];
    $pages = ceil($total / $limit);
    $previous = $page - 1;
    $next = $page + 1;
?>

<?php
    // Database Connection
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

    <!-- Script for Pagination -->
    <script type="text/javascript">
      function fetch_select_two(val) {
        $.ajax({
        type: 'post',
        url: 'getPosts.php',
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

   
    
    <!-- Favicon logo -->
    <link rel="shortcut icon" type="image/jpg" href="../photos/faviconbook.png">

    <title>StudySite</title>

    </head>
    <body style="background-image: url(../marketplace/img/background.png); background-size: cover;" data-spy="scroll" data-target="#navbar">
        <nav id="top-navbar" class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <!-- TODO: ADD HREF ID TO HOME HERE! -->
                            <a  class="nav-link" href="/IS216/WAD2-G7T2/web/index.html">Home</a>
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
                            <a class="nav-link" href="/IS216/WAD2-G7T2/login page/login.html">Login</a>
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
        <nav id="navbar" class="navbar sticky-top navbar-dark bg-success navbar-expand-md">
            <!-- collapsible nav bar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#the-nav" aria-controls="the-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="the-nav">
                <ul class="navbar-nav m-auto">
                    
                    <li class="nav-item">
                        <!-- TODO: ADD HREF ID TO Forum HERE! -->
                        <a class="nav-link" href="../marketplace/marketplace.html">Marketplace</a>
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

        <!-- Start of Forum Page layout  -->
        <div class="row" style=" justify-content: left; padding-top: 0px; padding-left: 20px; font-size: 70px; background-image: url(../web/photos/Books.jpg);">
            <div class="col-12">Message Board</div>
            <!-- Page Trail -->
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

        <!-- Button to add New Thread -->
        <div class="row" style="padding-left:20px ; padding-top: 10px;">
            <div class="col-auto">
              <a href="add_thread.php">
                <button class="btn btn-secondary btn-lg">New Thread</button>
              </a>
            </div> 
        </div>

        <!-- Table to display threads -->
        <div class="row" id="app" style="padding-left: 30px; padding-right:50px">    
          <h4 style="padding-top: 10px; padding-left:0px"> Thread Posts </h4> 
          <table class="table table-striped table-secondary table-hover col-xs-3">
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
                        //var_dump(gettype($post->getDate()));
                        //$date = date("D M d, Y G:i");
                        //var_dump(gettype($date));
                        $pdate = $post->getDate();
                        $date = strtotime(date('Y-m-d H:i:s'));
                        $pdate = strtotime($pdate);
                        //var_dump($date);
                        //var_dump($pdate);
                        $diff = $date - $pdate;
                        //var_dump($diff);
                        if($diff < 60 ){
                            $diff = 'A few seconds ago';
                        }
                        else if($diff >= 60 && $diff< 3600 ) {
                            $diff = round($diff/60).' mins ago';
                        }
                        else if($diff >= 3600 && $diff< 86400 ) {
                            $diff = round($diff / 3600).' hours ago';
                        }
                        else if($diff >= 86400 && $diff< (86400*30) ) {
                            $diff = round($diff / 86400).' days ago';
                        }
                        else if($diff >= (86400 * 30) && $diff< (86400*365) ) {
                            $diff = round($diff / (86400*30)).' months ago';
                        }
                        else {
                            $diff = round($diff / (86400*365)).' years ago';
                        }
                        
                        //var_dump($pdate);
                        //var_dump($diff);
                        //var_dump($pdate);
                        echo "
                            <tr>
                                <td>{$post->getID()}</td>
                                <td>
                                    $diff
                                </td>
                                <td>{$post->getUsername()}</td>
                                <td>
                                    <a href='replies.php?name={$post->getThreadName()}&id={$post->getID()}'>{$post->getThreadName()}</a>
                                </td>
                                <td>{$post->getContent()}</td>
                                <td>
                                    <a class='btn btn-success' href='add_reply.php?id={$post->getThreadName()}&value={$post->getID()}'>Reply</a>
                                </td>
                            </tr>
                        ";  
                    }
                ?>
            </tbody> 
        </div>

                
        <script>
            Vue.createApp({
                data() {
                    return {
                        threads: [] // array of post objects
                    }
                },           
                created() { // created is a hook that executes as soon as Vue instance is created
                    axios.get('http://localhost/IS216/WAD2-G7T2/web/forum/getPosts.php')
                    .then(response => {
                        // this gets the data, which is an array, and pass the data to Vue instance's posts property
                        this.threads = response.data
                        console.log('This is right')
                        
                    })
                    .catch(error => {
                        this.threads = [{ entry: 'There was an error: ' + error.message }]
                    })
                }
            }).mount('#app')
        </script>


        <!-- Pagination -->
        <div style="padding-bottom: 20px">
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="forum3.php?page=<?= $previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>
                    <?php for($i =1; $i<= $pages; $i++) : ?>
                    <li id="currentPage" class="page-item"><a  class="page-link" href="forum3.php?page=<?=$i;?>"><?=$i;?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="forum3.php?page=<?= $next; ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <script src="vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>