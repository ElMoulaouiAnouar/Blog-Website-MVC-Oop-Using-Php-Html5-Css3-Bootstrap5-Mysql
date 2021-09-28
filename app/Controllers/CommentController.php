<?php 
class CommentController extends Controller{

    private $comment_model = null;

    public function __construct()
    {
        $this->comment_model = $this->model('Comment');
    }

    public function create($data){
        if(isset($_SESSION['user_email'])){
            if($this->comment_model->Add($data)){
                return true;
            }
        }
        else{
            header("location: ".BASE_URL.'user/login');
        }
        
    }

    public function GetComments($id_post){
        return $this->comment_model->getAll($id_post);
    }

    public function TotalComments($id_post){
        return $this->comment_model->Count($id_post);
    }

    public function destroy($id_comment,$id_post){
        $comment = $this->comment_model->singleComment($id_comment);
        if($comment){
            if($_SESSION['user_id']){
                if($comment->id_user == $_SESSION['user_id']){
                    $this->comment_model->delete($id_comment);
                }
            }
        } 
        header("location: ".BASE_URL.'post/show/'.$id_post);
    }

    

}