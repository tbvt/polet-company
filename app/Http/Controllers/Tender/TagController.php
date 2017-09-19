<?php

namespace App\Http\Controllers\Tender;

use Orchid\CMS\Core\Models\Post;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * @param null $tag
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($tag = null)
    {
        if (is_null($tag)) {
            $tags = Post::allTags()->orderBy('count', 'desc')->limit(10)->get();

            return response()->json($tags);
        }
        $tags = Post::allTags()->orderBy('count', 'desc')->where('name', 'like', '%' . $tag . '%')->limit(10)->get();

        return response()->json($tags);
    }


}
