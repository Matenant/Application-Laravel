<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function enfants(){
        return $this->hasMany('App\Models\Categorie', 'parent_id');
    }

    public function choses(){
        return $this->hasMany('App\Models\Chose');
    }

    public function getParent(){
            $temp = $this;
            $categorie = $temp->name;
            while ($temp->parent_id != 0){
                $temp = $temp->parent;
                $categorie = $categorie . " \ " . $temp->name;
            }
            return $categorie;
    }

    public function estPareil($tempCategorie){

        do{
            if($tempCategorie->id == $this->id){
                return true;
            }
            if($tempCategorie->parent_id != 0){
                $tempCategorie = $tempCategorie->parent;
            }
        }while($tempCategorie->parent_id != 0);

        return false;
    }

}
