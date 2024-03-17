<?php

class View{

    public static function show ($viewname, $data=null){

        include "$viewname.php";
        include_once "footer.php";

    }


}