<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function items(){
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user(){
        return $this->belongsTo('CodeCommerce\User');
    }

    public function getStatusExtAttribute(){
        $status =
            [
                '0' => 'Aguardando confirmação da Financeira',
                '1' => 'Pagamento Aprovado',
                '2' => 'Separado para entrega',
                '3' => 'Na transportadora',
                '4' => 'Entrega realizada',
                '5' => 'Cancelado'
            ];
        $s = $this->attributes['status'];
        return $status[$s];
    }
}
