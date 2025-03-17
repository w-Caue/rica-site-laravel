<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class TicketLocal extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'LOCAL';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;
}
