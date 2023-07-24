<?php

class Contacto
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	
	public $nombre;
 	public $apellido;
	public $domicilio;
  	private $dni;
        
        private $telefonos;
  	
	

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	
	public function getApellido()
	{
		return $this->apellido;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	public function getDni()
	{
		return $this->dni;
	}
	
	public function getDomicilio()
	{
		return $this->domicilio;
	}
        
        public function getTelefonos()
	{
		return $this->telefonos;
	}
        
	
	public function setApellido($valor)
	{
		$this->apellido = $valor;
	}
	public function setNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function setDni($valor)
	{
		if(strlen($valor) == 8 )
			$this->dni = $valor;
		else
			return false;
	}
	
	public function setDomicilio($valor)
	{
		$this->domicilio = $valor;
	}
	
	public function setTelefonos( $telefono )
        {
            array_push($this->telefonos, $telefono);
        }
        
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($unContacto)
	{
            
            $this->telefonos = array();
            
            $this->setDni($unContacto[0]);
            $this->setNombre($unContacto[1]);
            $this->setApellido($unContacto[2]);
            $this->setDomicilio($unContacto[3]);
            foreach (explode(";",$unContacto[4]) as $unElemento)  //especialidad
                $this->setTelefonos($unElemento);
	}

        

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->apellido.", ".$this->nombre." - DNI: ".$this->dni ."- Un Telefono: ".$this->getTelefonos()[0] ;
	}
//--------------------------------------------------------------------------------//



}