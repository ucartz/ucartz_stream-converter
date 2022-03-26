<?php

namespace RadioStream;

use Illuminate\Database\Eloquent\Model;

class RadioStreams extends Model
{
    protected $table = 'radiostreams';
    protected $fillable = [
        'stream_name','server', 'port', 'mount','public_private','userId','status','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class, 'id', 'userId');
    }
    
    public function delete()
    {
        $this->users()->delete();
        return parent::delete();
    }
}
