<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CronJobTest extends Model
{
  protected $table = 'cron_test';
  public $timestamps = false;

  protected $fillable = ['cron_test', 'cron_time'];
}