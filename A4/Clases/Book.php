<?php
class Book
{
    public string $titular;
    public string $escritor;
    public int $numero_paginas;

    public function __construct(string $titulo, string $autor, int $paginas)
    {
        $this->titular = $titulo;
        $this->escritor = $autor;
        $this->numero_paginas = $paginas;
    }

    //Getters
    public function getPages(): int
    {
        return $this->numero_paginas;
    }
    public function getTitle(): string
    {
        return $this->titular;
    }

    public function getAuthor(): string
    {
        return $this->escritor;
    }

}
?>