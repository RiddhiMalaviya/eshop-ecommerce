<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','slug','short_description','description',
        'regular_price','sale_price','SKU','stock_status','featured',
        'quantity','image','images','category_id',
        'brand_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    /**
     * Update the rating percentage for the product based on reviews.
     * 
     * @return void
     */
    public function updateRatingPercentage()
    {
        $ratingPercentage = $this->calculateRatingPercentage();
        $this->rating_percentage = $ratingPercentage;
        $this->save();
    }
    /**
     * Calculate the rating percentage for the product.
     * 
     * @return float
     */
    private function calculateRatingPercentage()
    {
        $reviews=$this->reviews;
        if($reviews->isEmpty()){
            return 0;
        }
        $totalRating =$reviews->sum('rating');
        $averageRating = $totalRating / $reviews->count();
        $ratingPercentage = $averageRating*20;
        return $ratingPercentage;
    }
}
