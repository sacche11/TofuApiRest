<?php
require_once './app/models/catalogue.model.php';
require_once './app/views/api.view.php';

class CatalogueApiController {

    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new CatalogueModel();
        $this->view = new ApiView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getGenre() {
        $genre = $this->model->getAllGenre();
        $this->view->response($genre);
    }

    public function getCatalogue() {
        if(isset($_GET['sort']) && isset($_GET['order'])){

            if ($_GET['sort'] == 'name' && $_GET['order'] == 'asc'){
                $catalogueInOrder = $this->model->getInOrderName($_GET['order'], $_GET['sort']);
                $this->view->response($catalogueInOrder);
            } elseif ($_GET['sort'] == 'release_year' && $_GET['order'] == 'desc'){
                $catalogueInOrder = $this->model->getInOrderReleaseYear($_GET['order'], $_GET['sort']);
                $this->view->response($catalogueInOrder);
            }

        }else{  

            $catalogue = $this->model->getAll();
            $this->view->response($catalogue);

        }
    }         
    

    public function getFilmSerie($params = null) {
        $id = $params[':ID'];
        $element = $this->model->getElementCatalogueById($id);

        if ($element)
            $this->view->response($element);
        else 
            $this->view->response("La Pelicula/Serie con el id=$id no existe", 404);
    }

    public function deleteFilmSerie($params = null) {
        $id = $params[':ID'];

        $element = $this->model->getElementCatalogueById($id);
        if ($element) {
            $this->model->deleteToCatalogueById($id);
            $this->view->response($element);
        } else {
            $this->view->response("La Pelicula/Serie con el id=$id no existe", 404);
        }
    }

    public function insertFilmSerie() {
        $element = $this->getData();

        
        if (empty($element->id_gender) || empty($element->name) || empty($element->type) || empty($element->synopsis) || empty($element->duration) || empty($element->release_year)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $checkIdGender = $this->model->getGenderCheck($element->id_gender);
            if($checkIdGender!=null){    
                $id = $this->model->insertToCatalogue($element->id_gender, $element->name, $element->type,$element->synopsis,$element->duration,$element->release_year);
                $element = $this->model->getElementCatalogueById($id);
                $this->view->response("La Pelicula/Serie fue creada con exito", 201);
            }else{
                $this->view->response("El Genero no existe.", 404);
            }
        }
    }
}