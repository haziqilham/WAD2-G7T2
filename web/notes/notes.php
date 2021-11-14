<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "wad_t7");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

    <script type="text/javascript">
        function fetch_select(val) {
            $.ajax({
                type: 'post',
                url: 'getModule.php',
                data: {
                    get_option: val
                },
                success: function(response) {
                    console.log(response);
                    document.getElementById("new_select").innerHTML = response;
                }
            });
        }
    </script>


    <!-- Favicon logo -->
    <link rel="shortcut icon" type="image/jpg" href="../photos/faviconbook.png">

    <title>StudySite</title>

</head>

<body data-spy="scroll" data-target="#top-navbar" style="background-image: url(../marketplace/img/background.png);background-size: cover;">
    <div id='app'>
        <nav id="top-navbar" class="navbar fixed-top navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="../index.html" style="padding-left: 8px;">
                <img src="../photos/faviconbook.png" alt="" width="30" height="24">
                STUDYSITE
            </a>

            <div class="collapse navbar-collapse justify-content-end" v-if='user'>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{user.first_name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href='../../login page/profile.html'>Profile</a></li>
                            <li><button v-on:click='doLogout' class="btn">Logout</button></li>
                        </ul>
                    </li>

                </ul>
            </div>

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
    </div>






    <!-- Start of Forum Page layout  -->
    <div class="row" style=" justify-content: left; padding-top: 0px; padding-left: 20px; font-size: 70px;">
        <div class="col-12">Notes</div>
        <!-- Page Trail -->
        <div class="col-auto" style="padding-right: 2px;">
            <a href="../index.html" style="color: black; text-decoration: none; font-size: medium;">
                <p>Home</p>
            </a>
        </div>

        <div class="col-auto" style="padding-left: 2px; padding-right: 2px; font-size: medium; margin-left: 0;">
            <p>></p>
        </div>

        <div class="col-auto" style="padding-left: 2px; padding-right: 2px; text-decoration: underline; font-size: medium">
            <p>Notes</p>
        </div>
    </div>

    <!-- Button to add New Thread -->
    <div class="container" id="select_box" style="padding-left: 20px">
        <form class="form-horizontal" action="getNotes.php" method="get">
            <select class="form-control" onchange="fetch_select(this.value);">
                <option>Select School</option>
                <?php
                $sql = mysqli_query($connect, "SELECT * FROM school");
                //var_dump($sql);
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                    <option value="<?php echo $row['sid']; ?>">
                        <?php echo $row['sname']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <br>
            <select class="form-control" id="new_select" placeholder="Select Module" name="mod">
                <option>Select Module</option>
            </select>
            <br>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Search">
            </div>


        </form>


    </div>
</body>
<script src="../../login page/component.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous "></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 

</html>

<script>
    // Vue.createApp({
    //     data() {
    //         return {
    //             schools: [] // array of post objects
    //         }
    //     },
    //     created() { // created is a hook that executes as soon as Vue instance is created
    //         axios.get('http://localhost/IS216/WAD2-G7T2/web/notes/database/database/getSchools.php')
    //             .then(response => {
    //                 // this gets the data, which is an array, and pass the data to Vue instance's posts property
    //                 this.schools = response.data

    //             })
    //             .catch(error => {
    //                 this.schools = [{
    //                     entry: 'There was an error: ' + error.message
    //                 }]
    //             })
    //     }
    // }).mount('#app3')
</script>