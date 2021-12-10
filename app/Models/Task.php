<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $guarded = [];

    protected $appends = ['difference'];

    public function getDifferenceAttribute()
    {
        if ($this->status == 1) {
            $days = $this->created_at->diffInDays($this->updated_at);
            $hours = $this->created_at->diffInHours($this->updated_at->subDays($days));
            $minutes = $this->created_at->diffInMinutes($this->updated_at->subHours($hours));
            if ($minutes > 0) {
                return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
            }
        }
    }
}
