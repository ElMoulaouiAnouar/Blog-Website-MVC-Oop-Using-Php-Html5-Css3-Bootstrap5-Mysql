<?php 
class PostController extends Controller{

    private $post_model = null;

    public function __construct()
    {   
        $this->post_model = $this->model('Post');
    }

    public function index($param = null){
        $data =[
            'categories' => (new CategorieController())->getAll()
        ];
        if(is_null($param)){
            $data['posts'] = $this->post_model->GetAllPost();
        }
        else{
            $data['posts'] = $this->post_model->GetPostByCategoreis($param);
        }
        $this->view('posts/index',$data);
    }

    public function test($params){
       var_dump($this->post_model->GetPostByCategoreis($params));
    }

    public function show($id_post){
        $data = $this->post_model->findPost($id_post);
        $this->view('posts/show',$data);
    }

}