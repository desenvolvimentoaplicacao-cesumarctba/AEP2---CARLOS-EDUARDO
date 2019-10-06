<?php
		
	class Pessoa
	{
		public $nome; 
		public $altura; 
		public $peso;
		public $ano_nasc;
		public $cpf;

		public function __construct($nome, $altura, $peso, $ano_nasc, $cpf)
		{
			$this->nome = $nome;
			$this->altura = $altura;
			$this->peso = $peso;
			$this->ano_nasc = $ano_nasc;
			$this->cpf = $cpf;
		}

		public function calcula_imc()
		{
			$imc = ($this->peso / ($this->altura * $this->altura));
			return $imc;
		} 

		public function calcula_idade()
		{
			$idade = (2019 - $this->ano_nasc);
			return $idade;
		}

		public function valida_cpf()
		{
			$copia_cpf = preg_replace("/[^0-9]/","",$this->cpf); //Remove caracteres especiais da string.
			
			//Faz verificacao inicial caso o CPF digitado tenha esses padroes.
			if($copia_cpf == '00000000000' || $copia_cpf == '11111111111' || $copia_cpf == '11111111111' || $copia_cpf == '22222222222' || $copia_cpf == '33333333333' 
			|| $copia_cpf == '55555555555' || $copia_cpf == '66666666666' || $copia_cpf == '77777777777' || $copia_cpf == '88888888888' || $copia_cpf == '99999999999')
			{
				$this->cpf = " "; //Limpa o atributo cpf para não armazenar CPF invalido.
			}
			else
			{
				$dig_a = 0; // variavel validadora 1
				$dig_b = 0; // variavel validadora 2
				$j = 10;

				//Calcula primeiro digito depois do ' - ' 
				for($i = 0; $i < 9;$i++)
				{            				 
					$dig_a += $copia_cpf[$i] * $j;
					$j--;
				}
				if(($dig_a % 11) < 2)
				{
					$dig_a = 0;
				}
				else
				{
					$dig_a = (11 - ($dig_a % 11));
				}

				$j = 11;			 

				//Calcula segundo digito depois do ' - '
				for($i = 0; $i < 10; $i++)
				{
					$dig_b += $copia_cpf[$i] * $j;
					$j--;
				}

				if(($dig_b % 11) < 2)
				{
					$dig_b = 0;
				}
				else
				{
					$dig_b = 11 - ($dig_b % 11);
				}

				//Verifica se os dados do cpf são iguais aos valores calculados.
				if(($copia_cpf[9] != $dig_a) || ($copia_cpf[10] != $dig_b))
				{
					//Limpa o atributo cpf para não armazenar CPF invalido.
					$this->cpf = " "; 
				}
			}		
		}	
	}
	

?>