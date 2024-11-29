<?php
declare(strict_types=1); //Obligación de cumplimiento de tipos dentro de parametros
class Library_Version2
{
    public array $books;
    public string $libraryName;


    public function __construct(array $libros, string $nombreLibreria)
    {
        $this->books = $libros;
        $this->libraryName = $nombreLibreria;
    }

    //Setters
    public function setter_addBook(string $Titular)
    {
        $this->books[] = $Titular;
    }

    //Getters
    public function getLibros(): array
    {
        return $this->books;
    }

    //Funciones
    public function EliminarLibros(string $Titular)
    {
        $actualizacionLibros = [];

        foreach ($this->books as $libros) {
            if ($libros != $Titular) {
                $actualizacionLibros[] = $libros;
            }
        }
        $this->books = $actualizacionLibros;
    }

}

?>