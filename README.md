
## Importar la base de datos
-importar desde PHPMyAdmin (o cualquiera) database/db_tofu.sql

## Endpoints:

-Ubicacion: dentro de la carpeta htdocs se ubica la api, en mi caso se llama projects y dentro la carpeta tpe_part_2

-Method:     
    GET:

        *Para mostrar el contenido del catalogo -> http://localhost/projects/tpe_part_2/api/catalogue

        *Para obtener los datos ordenados, se utiliza los parametros SORT que trae una columna de la tabla y ORDER que los ordena (ascendente o descendente):

            #Para mostrar el contenido del catalogo en orden por nombre de manera ascendente -> http://localhost/projects/tpe_part_2/api/catalogue?sort=name&order=asc

            #Para mostrar el contenido del catalogo en orden por fecha de estreno de manera descendente -> http://localhost/projects/tpe_part_2/api/catalogue?sort=release_year&order=desc

        *Para mostrar una serie/pelicula en especifico, es necesario pasar el ID de la serie/pelicula a mostrar -> http://localhost/projects/tpe_part_2/api/catalogue/35

        **Para mostrar la tabla de Generos con su respectivo numero de ID (necesario para agregar peliculas/series con generos validos) -> http://localhost/projects/tpe_part_2/api/genre
            
    DELETE:

        *Para eliminar una serie/pelicula en especifico, es necesario pasarle el ID de la serie/pelicula a eliminar -> http://localhost/projects/tpe_part_2/api/catalogue/36

    POST:

        *Para agregar una serie/pelicula al catalgo, debe ingresar el id del genero de la serie/pelicula a agregar **(ver detalle abajo) -> http://localhost/projects/tpe_part_2/api/catalogue 

        La estructura es la siguiente: (Consulte la tabla de Generos para saber el ID correspondiente de la pelicula/serie que desea agregar)

        {
            "name": "Nombre de la Serie/Pelicula",
            "id_gender": Numero de Genero,
            "type": "Pelicula/Serie",
            "synopsis": "Sinopsis",
            "duration": "Duracion en minutos (130 mins) o cantidad de temporadas (7 Temps)",
            "release_year": "Fecha de estreno en este formato: 2010-07-14"
        }



        
         

