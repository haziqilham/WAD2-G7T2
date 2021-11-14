<?php  
                //var_dump($user_id);
                var_dump($_POST);
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "wad_g7";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                } else {
                    echo "Connection success!";
                }
                $sql = "INSERT INTO replies (likes)
                VALUES ('$user_id', '$threadName', '$content')";
                //var_dump($conn->query($sql));
                if ($conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>". "<br>" ."Click ".
                "<a class='btn btn-success' href='forum3.php' role='button'>here</a>"." to return to Message board!";;
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
?>
<!-- forum3 Table to display thread -->
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
                                <a class='btn btn-success' href='add_reply.php?id={$post->getThreadName()}&value={$post->getID()}'>Reply</a>
                            </td>
                        </tr>
                    ";
                    
                }
?>

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