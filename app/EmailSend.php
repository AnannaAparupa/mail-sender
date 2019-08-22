<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSend extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'template'
    ];

    public function emails()
    {
        return $this->belongsToMany(EmailList::class, 'email_send_individuals', 'email_send_id', 'email_list_id');
    }
}
