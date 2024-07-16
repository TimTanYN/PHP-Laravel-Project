<?php

namespace App\Observers;

use App\Models\Food;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class FoodObserver {

    public function creating(Food $food) {
        $this->savePhoto($food);
    }

    public function updating(Food $food) {
        $this->deletePhoto($food->getOriginal('photo'));
        $this->savePhoto($food);
    }

    public function deleting(Food $food) {
        $this->deletePhoto($food->photo);
    }

    private function savePhoto(Food $food) {
        $photo = $food->getAttribute('photo');

        if (is_a($photo, 'Illuminate\Http\UploadedFile') && in_array($photo->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'jfif'])) {
            $name = Str::ulid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->fit(200, 200)->save(public_path("/photos/$name"));
            $food->setAttribute('photo', $name);
        }
    }

    private function deletePhoto($name) {
        if ($name && $name !== '0.jpg') {
            File::delete(public_path("/photos/$name"));
        }
    }

}
