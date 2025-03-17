<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class TicketAnexo extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'TICKET_ANEXO';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;
}
