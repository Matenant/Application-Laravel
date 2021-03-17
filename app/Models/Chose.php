<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chose extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lieu(){
        return $this->belongsTo('App\Models\Lieu');
    }

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function getParentCategorie(){
        if($this->categorie_id != 0){
            $tempCategorie = $this->categorie;
            $StringCategorie = $tempCategorie->name;
            while ($tempCategorie->parent_id != 0){
                $tempCategorie = $tempCategorie->parent;

                $StringCategorie = $StringCategorie . " \ " . $tempCategorie->name;
            }
        }
        else{
            $StringCategorie = "Aucune";
        }

        return $StringCategorie;
    }

    public function getParentLieu(){
        if($this->lieu_id != 0){
            $tempLieu = $this->lieu;
            $StringLieu = $tempLieu->name;
            while ($tempLieu->parent_id != 0){
                $tempLieu = $tempLieu->parent;

                $StringLieu = $StringLieu . " \ " . $tempLieu->name;
            }
        }
        else{
            $StringLieu = "Aucune";
        }

        return $StringLieu;
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getTags(){
        $stringTag = "";

        foreach($this->tags as $tag){
            $stringTag = $stringTag . " " . $tag->name;
        }

        if($stringTag == ""){
            $stringTag = "Aucun tag";
        }

        return $stringTag;
    }
}
