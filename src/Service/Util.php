<?php

namespace App\Service;

class Util
{
    public function loadMenu($file)
    {
        $people_json = file_get_contents($file);
        $tab_json = json_decode($people_json, false);
        return $tab_json;
    }


}

