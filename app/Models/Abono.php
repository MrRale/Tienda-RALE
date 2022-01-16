<?php

namespace App\Models;

use App\Models\Cuenta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abono extends Model
{
    use HasFactory;
    public $fillable=[
        "fecha",
        "valor",
        "cuenta_id",
    ];
    public function cuenta(){
        return $this->belongsTo(Cuenta::class);
    }
}
