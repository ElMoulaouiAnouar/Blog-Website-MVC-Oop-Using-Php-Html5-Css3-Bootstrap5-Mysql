<?php 
class Comment{

    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function Add($data){
        // $this->db->Query("insert into comments(id_user,id_post,comment_description,status_comment,date_update_comment) values(:id_user,:id_post,:comment,:status,:date)");
        $this->db->Query("insert into comments(id_user,id_post,comment_description,status_comment) values(:id_user,:id_post,:comment,:status)");
        if($this->db->Execute([
            'id_user' => $data['id_user'],
            'id_post' => $data['id_post'],
            'comment' => $data['comment'],
            'status' => $data['status'],
            //'date' => $data['date']
        ])){
            return true;
        }
    }

    public function getAll($id_post){
        $this->db->Query("select comments.*,url_photo,users.name from comments INNER JOIN users on users.id_user=comments.id_user INNER JOIN photos on photos.id_photo=users.id_photo where status_comment like 'accepte' and comments.id_post like :id_post");
        return $this->db->DataResult(['id_post'=>$id_post]);
    }

    public function Count($id_post){
        $this->db->Query("select * from comments WHERE comments.status_comment like 'accepte' and comments.id_post=:id_post");
        $this->db->Execute(['id_post'=>$id_post]);
        return $this->db->RowCount();
    }

    public function delete($id_comment){
        $this->db->query("delete from comments where id_comment=:id_comment");
        $this->db->Execute(['id_comment'=>$id_comment]);
    }

    public function singleComment($id_comment){
        $this->db->query("select * from comments where id_comment=:id_comment");
        return $this->db->Single(["id_comment"=>$id_comment]);
    }

    public function update($data){
        $this->db->Query("update comments set comment_description = :comment_des where id_comment=:id_comment");
        if($this->db->Execute([
          'comment_des' => $data['comment_des'],
          'id_comment' => $data['id_comment']
        ])){
            return true;
        }
    }
}