<?php

class CatalogueModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tofu;charset=utf8', 'root', '');
    }

    //devuelve el catalogo
    public function getAll() {
        $query = $this->db->prepare("SELECT C.id_series_and_films, C.name, G.gender, C.type, C.synopsis, C.duration, C.release_year FROM catalog C JOIN gender G ON C.id_gender = G.id_gender");                       
        $query->execute();
        $catalogue = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $catalogue;
    }

    //Busca y devuelve un elemnto(pelicula/serie) dado un id.
    public function getElementCatalogueById($id){
        $query = $this->db->prepare("SELECT * FROM catalog WHERE id_series_and_films = ?");
        $query->execute([$id]);
        $element = $query->fetchAll(PDO::FETCH_OBJ);

        return $element;
    }

    //Inserta una serie/pelicula en la base de datos.
    public function insertToCatalogue ($id_gender, $name, $type, $synopsis, $duration, $release_year) {
        $query = $this->db->prepare("INSERT INTO catalog (id_gender, name, type, synopsis, duration, release_year) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$id_gender, $name, $type, $synopsis, $duration, $release_year]);
    }

    //Elimina una serie/pelicula dado su id.
    function deleteToCatalogueById($id) {
        $query = $this->db->prepare('DELETE FROM catalog WHERE id_series_and_films = ?');
        $query->execute([$id]);
    }

    //Actualiza los datos a la base de datos.
    public function editeElementCatalogue($id_gender, $name, $type, $synopsis, $duration, $release_year, $id){
        $query = $this->db->prepare("UPDATE catalog SET id_gender = ? ,name = ? ,type = ? ,synopsis = ?, duration = ?, release_year = ? WHERE id_series_and_films= ?");
        $query->execute([$id_gender, $name, $type, $synopsis, $duration, $release_year, $id]);
    }
}