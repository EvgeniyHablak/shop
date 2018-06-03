<?php

namespace App\Http\Controllers;

use App\ProductMedia;
use App\Media;

class MediaController extends Controller
{
    public function setMain($mediaId)
    {
        $productMedia = ProductMedia::where('media_id', $mediaId)->first();
        $previos = ProductMedia::where('product_id', $productMedia->product_id)
            ->where('type', 'main')
            ->first();
        if ($previos) {
            $previos->type = 'simple';
            $previos->save();
        }
        $productMedia->type = 'main';
        $productMedia->save();
        return redirect()->back();
    }

    public function delete($mediaId)
    {
        ProductMedia::where('media_id', $mediaId)->delete();
        Media::find($mediaId)->delete();
        return redirect()->back();
    }
}
