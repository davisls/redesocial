<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository extends BaseRepository {

    private $post;

    public function __construct(Post $post) {
        parent::__construct($post);
    }

    public function create($request) {
        return Post::create($request);
    }

    public function like($id, $user_id) {
        $post = $this->findById($id);

        if((count(array_keys($post->likes, $user_id)) < 1)) {
            $likes = $post->likes;
            array_push($likes, $user_id);
            $post->likes = $likes;
        }

        $post->save();
        return $post;
    }

    public function unlike($id, $user_id) {
        $post = $this->findById($id);

        $input = $post->likes;
        $key = array_search($id, $input);
        if($key !== false)
            array_splice($input, $key, 1);

        $post->likes = $input;

        $post->save();
        return $post;
    }
}
