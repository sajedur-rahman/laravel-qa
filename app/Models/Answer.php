<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
    protected $fillable = ['body', 'user_id'];

    use HasFactory;       

    public function question()
    {
       return $this->belongsTo(Question::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return $this->body;
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer){
           // echo"answer created\n";
            $answer->question->increment('answers_count');
          // $answer->question->save(); // no need its call automatically. 
        });

        // static::saved(function ($answer){
        //     echo"answer save\n";
        // });


        static::deleted(function ($answer){
            // echo"answer created\n";
             $answer->question->decrement('answers_count');
           // $answer->question->save(); // no need its call automatically. 
         });

    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }


}
