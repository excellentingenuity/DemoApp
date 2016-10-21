<?php

namespace App\Documents;

use eig\EloquentUUID\EloquentUUID;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class Document extends EloquentUUID
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['filename', 'path'];

    public function reservation()
    {
        return $this->belongsTo('App\Reservations\Reservation', 'id', 'reservation_id');
    }

    public function file($file_name = null, $file = null)
    {
        if($file != null && $file_name != null)
        {
            $this->filname = $file_name;
            $this->path = 'storage/app/' . $file_name;
            Storage::disk('local')->put($file_name, $file);
            return ['file_saved' => true];
        }
        return Storage::url($this->path);
    }
}
