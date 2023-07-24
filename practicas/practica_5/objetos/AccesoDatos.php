<?php

include_once( "configuraciones.php");
require 'Contacto.php';



class AccesoDatosContactos
{
    
        private $contactos;
    
        public function getUnContacto($dni)
        {   
            if(isset($this->contactos) == true)
            {
                foreach($this->contactos as $unContacto)
                {
                    if( $unContacto->getDni() == $dni)
                    {  
                        return $unContacto;
                    }
                }
                
                return null;
            }
        }
        
        public function getContactos()
        {
            return $this->contactos;
        }
        
        public function guardarContactos()
        {
            try {
                
            
                    if(file_exists(ARCHIVO_CONTACTOS))
                    {
        //28859353,Juan, Gonzales,pascual perez 100,+5493245669841;+5493424537807
                        $fp = fopen(ARCHIVO_CONTACTOS, "w");   //abrimos el archivo con permiso de escritura

                        foreach ($this->contactos as $unContacto)
                        {
                            $telefonos = $unContacto->getTelefonos();
                            $telefonos_string = "";

                            for($indice = 0; $indice < count($telefonos); $indice++)
                            {
                                if($indice < (count($telefonos) - 1))  //hasata el antepenultimo coloco un ;
                                    $telefonos_string .= $telefonos[$indice].";";
                                else
                                    $telefonos_string .= $telefonos[$indice];
                            }

                            $contacto_convertido = [$unContacto->getDni()
                                                    ,$unContacto->getNombre()
                                                    ,$unContacto->getApellido()
                                                    ,$unContacto->getDomicilio()
                                                    ,$telefonos_string];

                            fputcsv($fp, $contacto_convertido);
                        }
                    }
                    
                    
            } catch (Exception $ex) {
                return false;
            }
            
            return true;
        }
        
        public function setContacto($contacto)
        {
            
            array_push($this->contactos,$contacto);
        }
        
        public function delContacto($dni)
        {
            
        }
        
        public function editContacto($dni)
        {
            
        }
    
        
        public function __construct() 
        {
               
            $this->contactos = array();
            
                if(file_exists(ARCHIVO_CONTACTOS))
                {

                        $fp = fopen(ARCHIVO_CONTACTOS, "r");   //abrimos el archivo con permiso de lectura

                        
                        while(!feof($fp))
                        {
                            $fila = fgetcsv($fp);   //recuperamos la fila
                            if($fila !== false)    // si el retorno es nulo, finaliza
                            {
                                $unContacto = new Contacto($fila); //creamos un objeto paciente
                                 
                                array_push($this->contactos , $unContacto); //guardamos el objeto paciente en el array de pacientes
                            
                            }
                        }

                        fclose($fp); //cerramos el archivo
                        
                }
        
        }
}



