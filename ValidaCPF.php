<?php


//namespace Aula\Documentos\src;


class ValidaCPF

{
    private $cpf;


    public function __construct($cpf)
    {
        /**Troca de caracter improprio - transfiormando apenas
         * em uma sentenca De: "123.123.123-12" Para: "12312312312"
         */

        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace("//", "", $cpf);
        $cpf = str_replace('\\', "", $cpf);
        $cpf = str_replace("@", "", $cpf);

        $this->cpf = $cpf;


        $this->Validacao($cpf);

    }


    private function Confere($numeroVerificado)
    {
        $cpf = $this->cpf;

        if ($numeroVerificado == $cpf){
           echo "Válido";
        }else{
           echo "Invalido";}
    }
    private function Validacao($cpf)
    {
        /** verifica se o CPF contém apenas numeros-(preg_match('/\d+/',$cpf)>0).
         * Se existe numeros repetido-($cpf != '11111111111') ($cpf!= '00000000000').
         * Se possui o tamho Correto-(strlen($cpf)==11)).
         */
        if ((preg_match('/\d+/', $cpf) > 0) and
            ($cpf != '11111111111') and
            ($cpf != '00000000000') and (strlen($cpf) == 11)) {


            /**  $validacao - Trnasforma o CPF em uma ARRAY-(str_split($this->cpf))*/

            $validacao = (str_split($this->cpf));


            /** Retira os digitos de verificação do CPF Exemplo: De: 123.123.123-12
             * Para: 123.123.123 */
            for ($i = 2; $i >= 1; $i--) {
                $n = count($validacao);
                unset($validacao[$n - 1]);

            }
            /** Encontra o primeiro Digito.*/
            $digito1 = $this->Digito($validacao);

            /**Encontra o segundo Dígito.*/
            $numeroVerificado = $this->Digito($digito1);

            /** Converte $numeroVerificado em String */
            $numeroVerificado = implode("",$numeroVerificado);

            /** Confere os dois números */
            $this->Confere($numeroVerificado);

        } else{
            echo 'Invalido';}


    }
     private function Digito($numero): array {
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