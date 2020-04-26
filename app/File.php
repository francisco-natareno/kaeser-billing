<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\FileUploadEvent;
use Event;

class File extends Model
{
    protected $guarded = ['id'];
    public static function boot() {
        parent::boot();

	    static::created(function($file) {
	        Event::dispatch('file.created', $file);
	    });

	    static::updated(function($file) {
	        Event::dispatch('file.updated', $file);
	    });
	}
}
