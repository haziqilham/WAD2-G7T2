<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Vue 3 -->
    <script src='https://cdn.jsdelivr.net/npm/vue@3.0.2/dist/vue.global.js'></script>

    <!-- Custom Css -->
    <link rel="stylesheet" href="../css/main.css">

    <!--AXIOS-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- VUE CDN -->
    <script src="https://unpkg.com/vue@next"></script>


    <!-- Favicon logo -->
    <link rel="shortcut icon" type="image/jpg" href="../photos/faviconbook.png">

    <title>StudySite</title>


</head>

<body style="background-image: url(../marketplace/img/background.png); background-size: cover;" data-spy="scroll" data-target="#navbar" id='app'>
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
                        <a class="nav-link" href="../tetris/games.html">Games</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../notes/notes.php">Notes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{user.first_name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href='../login page/profile.html'>Profile</a></li>
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

                    <a class="nav-link" href="../tetris/games.html">Games</a>
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="../notes/notes.php">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login page/login.html">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn rounded-pill bg-primary" href="../login page/register.html">Register</a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- End NavBar -->

    <div class="row" style=" justify-content: left; padding-top: 0px; padding-left: 20px; font-size: 70px;">
        <div class="col-12">Message Board</div>
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

        <div class="col-auto" style="padding-left: 2px; padding-right: 2px;">
            <a href="./add_thread.php" style="color: black; text-decoration: underline; font-size: medium;" id="forum">
                <p>New Thread</p>
            </a>
        </div>

    </div>

    <div class="row" style="justify-content: left; margin-top: 0px; padding-left: 20px;" id="new">
        <form action="insertData.php" method="get">
            <div class="form-group">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username"class="form-control">
            </div>
            <div class="form-group">
                <label for="threadName">Thread Name:</label>
                <input type="text" name="threadName" class="form-control">

            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="content"></textarea>
            </div>

            <div class="form-group" style="padding-top: 10px;">
                <a href="insertData.php">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </a>
            </div>
        </form>
    </div>
    </div>



    <script src='../login page/component.js'></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous "></script>

</body>

</html>