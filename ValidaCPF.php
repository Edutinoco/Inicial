<?php


//namespace Aula\Documentos\src;


class ValidaCPF

{
    private $cpf;


    public function __construct($cpf)
    {

        $this->cpf = $cpf;

        $this->limpaCpf($cpf);

    }
    private function limpaCpf(string $cpf) : string {
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace("//", "", $cpf);
        $cpf = str_replace('\\', "", $cpf);
        $cpf = str_replace("@", "", $cpf);
        $this->validacao($cpf);
        return $cpf;
    }
    private function confere($numeroVerificado)
    {
        $cpf = $this->cpf;

        if ($numeroVerificado == $cpf){
           echo "Válido";
        }else{
           echo "Invalido";}
    }
    private function validacao($cpf)
    {
        //(preg_match('/\d+/', $cpf) > 0)
        if (ctype_alnum($cpf) and
            ($cpf != '11111111111') and
            ($cpf != '00000000000') and (strlen($cpf) == 11)) {




            $validacao = (str_split($this->cpf));



            for ($i = 2; $i >= 1; $i--) {
                $n = count($validacao);
                unset($validacao[$n - 1]);

            }

            $digito1 = $this->digito($validacao);


            $numeroVerificado = $this->digito($digito1);


            $numeroVerificado = implode("",$numeroVerificado);


            $this->confere($numeroVerificado);

        } else{
            echo 'Invalido';}


    }
     private function digito($numero): array {
         $n = count($numero);

         $resultado = array();

         for ($i = $n + 1; $i>=2; $i--){
             $multiplicador[] = $i;
         }

         for ($i = 0; $i <= $n - 1; $i++) {

             $resultado[$i] = $numero[$i] * $multiplicador[$i];

         }

         $somaDiv = array_sum($resultado) / 11;

         if ((array_sum($resultado) % 11) < 2) {

             $digito = 0;
             ($numero[count($numero)] = $digito);
             return $numero;

         } elseif ($somaDiv >= 2) {


             $frac = ($somaDiv - (int)$somaDiv);


             $digito = 11 - (ceil(round($frac, 2) * 10));
             $digito = (string)$digito;
             ($numero[count($numero)] = $digito);
             return $numero;
         }






     }



}