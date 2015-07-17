<?php

namespace CodeCommerce;


class Cart {

    private $items;

    public function __construct(){
        $this->items = [];
    }

    //add
    public function add($id, $name, $price){

        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'name' => $name,
                'price' => $price
            ]
        ];

        return $this->items;

    }
    //increment
    public function increment($id){
        $this->items[$id]['qtd']++;
        return $this->items;
    }
    public function decrement($id){
        if($this->items[$id]['qtd']==1){
            $this->remove($id);
        }else{
            $this->items[$id]['qtd']--;
        }

        return $this->items;
    }
    //remove
    public function remove($id){
        unset($this->items[$id]);
    }
    //all
    public function all(){
        return $this->items;
    }
    public function find($id){
        return $this->items[$id];
    }
    //getTotal
    public function getTotal(){
        $total =0;
        foreach($this->items as $item){
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }

    public function clear(){
        $this->items = [];
    }
} 