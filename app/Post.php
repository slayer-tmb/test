<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function tags(){
        return $this -> belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public static function add($fields){
        $post = new static;
        $post -> fill($fields);
        $post -> save();

        return $post;
    }

    public function edit($fields){
        $this -> fill($fields);
        $this -> save();
    }

    public function remove(){
        $this -> removeImage();
        $this -> delete();
    }

    public function removeImage(){
        if ($this -> image != null){
            Storage::delete('uploads/'.$this -> image);
        }
    }

    public function uploadImage($image){
        if ($image == null) { return; }

        $this -> removeImage();
        $filename = Str::random(10).'.'.$image -> extension();
        $image -> storeAs('uploads', $filename);
        $this -> image = $filename;
        $this -> save();
    }

    public function getImage(){
        if ($this -> image == null){
            return '/img/no-image.png';
        }
        return '/uploads/'.$this -> image;
    }

    public function setTags($ids){
        if ($ids == null){ return; }

        $this -> tags() -> sync($ids);
    }

    public function getTagsTitles()
    {
        return (!$this -> tags -> isEmpty())
            ?   implode(', ', $this -> tags -> pluck('title') -> all())
            : 'Нет тегов';
    }
}
