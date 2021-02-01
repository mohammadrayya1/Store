<?php
namespace PHPMVC\lib;


trait helper
{


    public function redirect($path)
    {
        session_write_close();
        header("location: $path ");
        exit();
    }

}