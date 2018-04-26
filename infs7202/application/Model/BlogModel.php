<?php

/**
 * Class BloggerModel/
 * For set and get blogger information
 */

class BloggerModel extends Model {
    // data access
    var $blog;

    public function construct($blog){
        $this->blog = $blog;
    }

    /**get all blogs record
     *
     */
    public function getAllBlog(){
        $sql = "SELECT * FROM blog";
        $result = $conn->query($sql);
        if(result){
            return result;
        }else{
            echo "Loading blog fail";
        }
    }

    /**get a blog record according username
     * @param  $username
     */
    public function getBlog($username){
        $sql= "SELECT * FROM Blog WHERE Username = '$username';";
        $result = $conn->query($sql);
        if(result){
            return $result;
        }else{
            echo "Loading blog fail";
        }
    }

    /**set a blog record after user post blog
     * @param  $username,$time,$title
     */
    public function setBlog($username,$time,$title){
        $sql="INSERT INTO Blog (Username,Time,Title)VALUES ('$username','$time','$title')";
        $result = $conn->query($sql);

        if(!result){
            echo "Post blog fail";
        }else{
            null;
        }

    }

}
?>