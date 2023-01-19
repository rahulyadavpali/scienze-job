<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scraping extends Model
{
    use HasFactory;
    protected $table = 'tb_scraping';
}
