<?php

namespace Modules\ColorGroup\Entities;

use Illuminate\Database\Eloquent\Model;

class ColorGroup extends Model
{
    protected $table = "group_color";
    protected $fillable = ["title","status","group_color"," created_at"];
}
