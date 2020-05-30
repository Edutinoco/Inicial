<?php


//namespace Aula\Documentos\src;


class ValidaNome
{
    private $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        
        $this-> validaNome($nome);
    }

    private function validaNome(string $nome)
    {

        $edtNome=str_replace(" ","",$nome);

        if (ctype_alpha($edtNome) and (strlen($edtNome)>=3)){
            echo $nome;
            return $nome;
        } else {
           echo "O seu nome está Inválido mas o ";
        }

    }
}
