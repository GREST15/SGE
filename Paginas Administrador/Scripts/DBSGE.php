<?php
class Database
{
    private $PDOLocal;
    private $user = "root";
    private $password = "";
    private $server ="mysql:host=localhost; dbname=sge";

    function conectarDB()
    {
        try 
        {
            $this->PDOLocal =new PDO($this->server,$this->user,$this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    function desconectarDB()
    {
        try 
        {
            $this->PDOLocal = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function seleccionar($consulta)
    {
        try
        {
            $resultado=$this->PDOLocal->query($consulta);
            $fila= $resultado->fetchALL(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
function ejecutarSQL($cadena)
{
   
    try
    {
        $this->PDOLocal->query($cadena);
        
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    
    }

}
}
?>