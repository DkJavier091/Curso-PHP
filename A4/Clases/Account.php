<?php
declare(strict_types=1); //Obligación de cumplimiento de tipos dentro de parametros

class Account
{
    //Propiedades Especiales
    protected string $owner;
    protected float $balance;

    public array $numbers;
    public string $type;
    public string $surname;


    // Constructor con valores predefinidos ESTRICTOS ----
    public function __construct(array $numbers, string $type, float $balance = 0.00, string $owner = '', string $surname = '')
    {
        $this->numbers = $numbers;
        $this->type = $type;
        $this->balance = $balance;
        $this->owner = $owner;
        $this->surname = $surname;
    }
    //Getters
    public function getBalance(): float{
        return $this->balance;
    }

    public function getOwner(): string{
        return $this->owner;
    }
    //Setters
    public function setOwner($nameOwner): void{
        $this->owner = $nameOwner;
    }
    //Funciones
    public function deposit(float $amount): float{

        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float{
        $this->balance -= $amount;
        return $this->balance;
    }
}

?>