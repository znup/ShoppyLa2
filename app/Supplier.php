<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable=['name', 'document_type', 'document_number', 'direction', 'phone', 'email'];
}
