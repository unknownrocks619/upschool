<?php

namespace App\Models\Corcel;

use App\Models\Corcel\Meta\WPMeta as MetaWPMeta;
use Corcel\Model\Meta\ThumbnailMeta;
use Corcel\Model\Post as CModel;
use Corcel\Model\Meta\WPMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends CModel
{
    use HasFactory;
    public $timestamps = false;

    protected $connection = "wp_compactibility";
    protected $table = "posts";


    public function metaPost()
    {
        return $this->hasMany(WPMeta::class, 'post_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(MetaWPMeta::class, 'meta_value', 'post_title')->where('meta_key', 'charity_name');
    }

    public function logo()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'logo');
    }

    public function imageOne()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'sdg_1_image');
    }
    public function imageTwo()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'sdg_2_image');
    }
    public function imageThree()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'sdg_3_image');
    }
    public function imageFour()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'sdg_4_image');
    }
    public function imageFive()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'sdg_5_image');
    }


    public function postImageOne()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'image_1');
    }
    public function postImageDescription()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_1');
    }

    public function postImageTwo()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'image_2');
    }
    public function postImageDescriptionTwo()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_2');
    }

    public function postImageThree()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_1');
    }

    public function postImageDescriptionThree()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_3');
    }

    public function postImageFour()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'image_4');
    }

    public function postImageDescriptionFour()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_4');
    }

    public function postImageFive()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'image_5');
    }
    public function postImageDescriptionFive()
    {
        return $this->hasOne(ThumbnailMeta::class, 'post_id')
            ->where('meta_key', 'description_5');
    }
}
