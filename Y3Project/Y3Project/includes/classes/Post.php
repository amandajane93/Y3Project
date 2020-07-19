<?php 
class Post { 
    private $user_obj;
    private $con;

    public function __construct($con, $user){
        $this->con = $con; 
        $this->user_obj = new User($con, $user);
    }


    public function submitPost($body, $user_to){
        $body = strip_tags($body); //removes html tags 
        $body = mysqli_real_escape_string($this->con, $body); // won't act on any special characters in the body

        $body = str_replace('\r\n', '\n', $body);
        $body = nl2br($body);

        $check_empty = preg_replace('/\s+/', '', $body); //deletes all spaces 
        
        if($check_empty !=""){

            $date_added = date("Y-m-d H:i:s"); //date and time
            $added_by = $this->user_obj->getUsername();  //get username 

            if($user_to == $added_by){    //if user is sending the post to their own profile, user_to is set to none
               $user_to = "none";
            }

            //add posts to database
            $query = mysqli_query($this->con, "INSERT INTO posts VALUES(' ','$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
            $returned_id = mysqli_insert_id($this->con);

            //Insert Notifications 

            //Update User post count 
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'"); 


        }
    }

}
?>