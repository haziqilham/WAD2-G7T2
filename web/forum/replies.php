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
            <div>
                <?php 
                //var_dump($_GET);
                $name = $_GET['name'];
                echo $name
            
                ?>
            </div>
            
            <div class="col-auto" style="padding-right: 2px;">
                <a href="../index.html" style="color: black; text-decoration: none; font-size: medium;">
                    <p>Home</p></a>
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
                    <th>Reply ID</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Reply</th>
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
                  </tr>
                ";
              }
              var_dump($id);
              
              ?>
            </tbody>

            <!-- <div class="col-2" id="hide3">
                <button class="btn btn-primary" onclick="return showThread()">New Thread</button>
            </div> -->
            <!-- <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="categorydownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="categorydownMenuButton">
                  <a class="dropdown-item" href="#" onclick="haziq()">Haziq</a>
                  <a class="dropdown-item" href="#">Soon Ann</a>
                  <a class="dropdown-item" href="#">DaiWei</a>
                </div>
            </div> -->

            
        </div>




        <!-- <div class="col-2" id="hide3">
          <a href="add_thread.php">
  
          
            <button class="btn btn-primary" onclick="return showThread()">New Thread</button>
          </a>
        </div> -->
  
  
    </div>
  
  
  
  
  
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
  
      
  

        <!-- <div id="replies">
        </div>


        <div v-if="!button_click" class="row" style="padding-left: 30px; padding-top: 20px; padding-right: 50px;" id="hide2">
            <table class="table" id="content">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Username</th>
                    <th scope="col">Thread Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Replies</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>21 Oct</td>
                    <td>@Shah</td>
                    <td><a id="link_one" title="Click to see Replies" href="#" onclick="showComments(id);return false;"><p id="link_one_word">WAD2 Reflection</p></a></td>
                    <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique aliquid quos totam deleniti illo nesciunt, quisquam a ipsam nostrum. Aspernatur, quibusdam mollitia. Delectus vitae sunt reiciendis voluptatibus totam temporibus esse?</td>
                    <td>3</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>21 Oct</td>
                    <td>@Kyong</td>
                    <td><a id="link_two" title="Click to see Replies" href="#" onclick="showComments(id);return false;"><p id="link_two_word">OOP Topics</p></a></td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis accusantium, reiciendis sed sunt ex dolorum doloribus at necessitatibus laudantium voluptatibus quis dignissimos fugit ullam aliquam soluta consectetur consequatur quae aperiam!</td>
                    <td>25</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>22 Oct</td>
                    <td>@dawei98</td>
                    <td><a id="link_three" title="Click to see Replies" href="#" onclick="showComments(id);return false;"><p id="link_three_word">OOP Groupings</p></a></td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facere placeat, animi consequuntur recusandae adipisci nemo, mollitia nulla nam, quidem omnis laudantium dolore quis voluptatum debitis libero quisquam reprehenderit commodi?</td>
                    <td>7</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>22 Oct</td>
                    <td>@gabbychang</td>
                    <td><a id="link_four" title="Click to see Replies" href="#" onclick="showComments(id);return false;"><p id="link_four_word">IDP Project Filming</p></a></td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facere placeat, animi consequuntur recusandae adipisci nemo, mollitia nulla nam, quidem omnis laudantium dolore quis voluptatum debitis libero quisquam reprehenderit commodi?</td>
                    <td>81</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>22 Oct</td>
                    <td>@avocadog</td>
                    <td><a id="link_five" title="Click to see Replies" href="#" onclick="showComments(id);return false;"><p id="link_five_word">SMU Football Gossip</p></a></td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta facere placeat, animi consequuntur recusandae adipisci nemo, mollitia nulla nam, quidem omnis laudantium dolore quis voluptatum debitis libero quisquam reprehenderit commodi?</td>
                    <td>91</td>
                  </tr>
    
                </tbody>
              </table> -->

              <!-- <div class="row" id="content">
                <ul class="pagination" style="justify-content: center;">
                    <li class="page-item"><a style="color: black;" class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a style="color: black;" class="page-link" href="#">1</a></li>
                    <li class="page-item active" ><a style="color: black;" class="page-link" href="#">2</a></li>
                    <li class="page-item"><a style="color: black;" class="page-link" href="#">3</a></li>
                    <li class="page-item"><a style="color: black;" class="page-link" href="#">Next</a></li>
                  </ul>
            </div> -->
              
        </div>

        
            <!-- <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="check">check</span>
                </div>
                <input type="text" class="form-control" id='check' placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Username</span>
                </div>
                <input type="text" id="daiwei" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Thread Name</span>
                </div>
                <input type="text" id="haziq" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Text Content</span>
                </div>
                <textarea class="form-control" id="soonann" aria-label="With textarea"></textarea>
              </div> -->
            <!-- <button class="btn btn-primary" onclick="unhide()">Submit</button> -->

            
        </div>

        <!-- <div class="row">
            <ul class="pagination" style="justify-content: center;">
                <li class="page-item"><a style="color: black;" class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a style="color: black;" class="page-link" href="#">1</a></li>
                <li class="page-item active" ><a style="color: black;" class="page-link" href="#">2</a></li>
                <li class="page-item"><a style="color: black;" class="page-link" href="#">3</a></li>
                <li class="page-item"><a style="color: black;" class="page-link" href="#">Next</a></li>
              </ul>
        </div> -->


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
    <script src="forum.js"></script>
    <script src="vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    
</body>
</html>