<?php

require './AccesoDatos.php';

class Agenda
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	
	 	
        private $contactos;

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	
        function getContactoPorDNI($dni)
        {
            return $this->contactos->getUnContacto($dni);
        }
	
	
        function agregarContacto($arrayDatos)
        {
            //28859353,Juan," Gonzales","pascual perez 100",+5493245669841;+5493424537807
            $unContacto = new Contacto($arrayDatos);
            
            if($this->getContactoPorDNI($unContacto->getDni()) == null )
            {
                $this->contactos->setContacto($unContacto);
                return true;
            }
            else
            {
                return "El contacto ya existe";
            }
        }
	
        function listaDeContactos()
        {
            
            return $this->contactos->getContactos();
        }
        
        
        public function guardarContactos()
        {
            
            if($this->contactos->guardarContactos())
                return "¡Guardado, con exito!";
            else
                return "¡Error al guardar!";
        }

            

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($dni=NULL)
	{
                
            $this->contactos = new AccesoDatosContactos();
            
            
	}



}