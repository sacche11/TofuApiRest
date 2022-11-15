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

    //devuelve todos los tipos de generos disponibles
    public function getAllGenre() {
        $query = $this->db->prepare("SELECT * FROM gender");                       
        $query->execute();
        $genre = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $genre;
    }

    //devuelve el catalogo ordenado por nombre de forma ascendente 
    public function getInOrderName(){
        $query = $this->db->prepare("SELECT C.name, G.gender, C.type, C.synopsis, C.duration, C.release_year FROM catalog C JOIN gender G ON C.id_gender = G.id_gender ORDER BY name ASC");
        $query->execute();
        $InOrderName = $query->fetchAll(PDO::FETCH_OBJ);

        return $InOrderName; 
    }

    //devuelve el catalogo ordenado por fecha de estreno de forma descendente
    public function getInOrderReleaseYear(){
        $query = $this->db->prepare("SELECT C.name, G.gender, C.type, C.synopsis, C.duration, C.release_year FROM catalog C JOIN gender G ON C.id_gender = G.id_gender ORDER BY release_year DESC");
        $query->execute();
        $InOrderReleaseYear = $query->fetchAll(PDO::FETCH_OBJ);

        return $InOrderReleaseYear; 
    }

    //Busca y devuelve un elemnto(pelicula/serie) dado un id.
    public function getElementCatalogueById($id){
        $query = $this->db->prepare("SELECT C.name, G.gender, C.type, C.synopsis, C.duration, C.release_year FROM catalog C JOIN gender G ON C.id_gender = G.id_gender WHERE id_series_and_films = ?");
        $query->execute([$id]);
        $element = $query->fetchAll(PDO::FETCH_OBJ);

        return $element;
    }

    public function getGenderCheck($id){
        $query = $this->db->prepare("SELECT * from gender WHERE id_gender = ?");
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
    public function deleteToCatalogueById($id) {
        $query = $this->db->prepare('DELETE FROM catalog WHERE id_series_and_films = ?');
        $query->execute([$id]);
    }
}