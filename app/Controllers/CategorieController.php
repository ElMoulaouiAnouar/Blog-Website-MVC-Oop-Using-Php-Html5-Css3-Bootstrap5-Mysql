<?php 
class CategorieController extends Controller{
    private $categorie_model = null;

    public function __construct()
    {
        $this->categorie_model = $this->model('Categorie');
    }

    public function getAll(){
        return $this->categorie_model->GetCategories();
    }
}