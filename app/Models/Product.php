<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name', 'detail', 'image','prix','qt','cmd_id'

    ];



    public function commande()

    {

        return $this->belongsTo(Commande::class);

    }

    

}