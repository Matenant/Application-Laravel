<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;

    protected $table = "lieux";
    protected $primaryKey = 'id';
    protected $guarded = [];


    public function parent(){
        return $this->belongsTo('App\Models\Lieu');
    }

    public function enfants(){
        return $this->hasMany('App\Models\Lieu', 'parent_id');
    }

    public function choses(){
        return $this->hasMany('App\Models\Chose');
    }

    public function getParent(){
        $temp = $this;
        $lieu = $temp->name;
        while ($temp->parent_id != 0){
            $temp = $temp->parent;
            $lieu = $lieu . " \ " . $temp->name;
        }
        return $lieu;
    }

    public function estPareil($tempLieu){

        do{
            if($tempLieu->id == $this->id){
                return true;
            }
            if($tempLieu->parent_id != 0){
                $tempLieu = $tempLieu->parent;
            }
        }while($tempLieu->parent_id != 0);

        return false;
    }
}
