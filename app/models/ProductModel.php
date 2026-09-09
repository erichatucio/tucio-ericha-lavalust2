<?php
class ProductModel extends Model
{
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = ['product_name', 'description', 'price', 'quantity', 'created_at'];
    protected $guarded = ['id'];
}
