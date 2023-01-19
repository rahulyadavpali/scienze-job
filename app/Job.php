<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'tb_job';

    public function applicants()
    {
        return $this->hasMany(Apply::class, 'job_id');
    }
}
