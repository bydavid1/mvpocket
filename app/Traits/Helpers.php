<?php

namespace App\Traits;

trait Helper {

    public function verifyUser(){
        return auth()->user();
    }

}