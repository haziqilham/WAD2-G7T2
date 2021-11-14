IS216 Web Application Development 2 

Session G6 Team 7 Source Codes

Team Members:

Aw Wei Jun
Chua Soon Ann
Lim Dai Wei
Muhammad Haziq Bin Ilham




Folder Directory:

    Each functionalities have been separated into their respective folders.
    -Forum
    -Marketplace
    -Notes
    -Games [located in tetris folder]

  

For local deployment:

-Database: 
    Ensure a MySQL database server is running
    1) upload compiled.sql found in /web directory

-Frontend:
    Extract all the components inside web folder and place them inside the localhost (htdocs or www)
    Navigate to localhost for index.html


User login information:
Userid: jjtan.2020@scis.smu.edu.sg
Password: password



DATABASE CONFIGURATIONS [mySQL]

For Mac Users:

    [Default user for Mac is 'root']
    [Default password for Mac is 'root']

  
For Windows Users:

    [Default user for Windows is 'root']
    [Default password for Windows is '']





******    Ensure that the following passwords in the files are set correctly:
        Forum
        -/web/forum/conn.php
        -/web/forum/database/ConnectionManager.php 

        Notes
        -/web/notes/notes.php
        -/web/notes/database/model/ConnectionManager.php
        -/web/notes/getModule.php  

        Services
        -/services/model/ConnectionManager.php

        Forum
        -/forum/getdislikes.php
        -/forum/getlikes.php

        Marketplace
        -/web/marketplace/retrieveData.php
        -/web/marketplace/insertData.php
