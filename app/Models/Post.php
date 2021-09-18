<?php
class Post{

    private $db = null;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    //function get all posts from database
    
     public function GetAllPost(){
        $this->db->Query('select posts.id_post,title,description,date_update_post,url_photo from photos INNER JOIN posts on posts.id_photo=photos.id_photo');
        return $this->db->DataResult();
    }

    //function get posts by categories from database
     public function GetPostByCategoreis($categories){
        $this->db->Query("select posts.id_post,title,description,date_update_post,url_photo from photos INNER JOIN posts on posts.id_photo=photos.id_photo INNER JOIN posts_categories on posts.id_post=posts_categories.id_post INNER JOIN categories on categories.id_categorie=posts_categories.id_categorie WHERE categories.libelle like ?");
       // $this->db->BindParam(':cat',$categories);
        return $this->db->DataResult([HelpersFunction::AddSpaceToWord($categories)]);
    } 
    

    public function findPost($id_post){
        $this->db->Query("select posts.id_post,title,description,date_update_post,url_photo from photos INNER JOIN posts on posts.id_photo=photos.id_photo where posts.id_post like :id_post");
        return $this->db->single(['id_post' => $id_post]);
    }
    


}

