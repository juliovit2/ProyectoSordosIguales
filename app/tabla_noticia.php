<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_noticia extends Model
{
    protected $fillable = [
        'video', 'titulo', 'contenido',
    ];

    public function getSummary($size) {
        $summary =  strip_tags($this->contenido);
        //$summary = str_replace('.', '. ', $summary);
        $summary = str_replace('&iuml', '', $summary);
        $summary = str_replace('&raquo', '', $summary);
        $summary = str_replace('&iquest', '', $summary);
        $summary = str_replace(';', '', $summary);
    
        $isTruncated = strlen($summary) > $size;
    
        $summary = substr($summary, 0, $size);
        return($summary . ($isTruncated ? '...' : ''));
    }
    
}
