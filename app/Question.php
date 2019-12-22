<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise', 'question', 'opt1', 'opt2', 'opt3', 'opt4', 'correct_opt',
    ];

    /*
    * This is For CRUD
    *
    */
    protected $table = 'question';

    /**
     * Question & Exercise Relationship
     * Question Belongs To Exercise
     *
     */
    public function questionExercise()
    {
        return $this
            ->belongsToMany('App\Exercise')
            ->withTimestamps();
    }
}
