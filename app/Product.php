<?php

namespace App;

use Laravelha\Support\Traits\Tableable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    use Tableable;

    protected $guarded = ['id'];

    /**
     * ['data' => 'columnName', 'searchable' => true, 'orderable' => true, 'linkable' => false]
     *
     * searchable and orderable is true by default
     * linkable is false by default
     *
     * @return array[]
     */
    public static function getColumns(): array
    {
        return [
            ['data' => 'id', 'linkable' => true],
            ['data' => 'name'],
            ['data' => 'value'],
            ['data' => 'category_id'],
        ];
    }

    
    /**
     * Get the category of Product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
