<?php namespace codeCommerce {

    use Illuminate\Database\Eloquent\Model;

    /**
     * @property mixed tags
     */
    class Product extends Model
    {

        protected $fillable = ['name','description','price','featured','recommend'];

        public function category(){
	    	return $this->belongsTo('CodeCommerce\Category');
	    }

        public function images(){
            return $this->hasMany('CodeCommerce\ProductImage');
        }

        public function tags(){
            return $this->belongsToMany('CodeCommerce\Tag');
        }

        public function getTagListAttribute(){
            $tags = $this->tags->lists('name')->toArray();
            return implode(',', $tags);
        }
    }
}