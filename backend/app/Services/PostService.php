<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Interfaces\PostInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Exception;

class PostService implements PostInterface {

    private $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function search($id) {
        $post = $this->postRepository->findById($id);
        if($post)
            return $post;

        throw new Exception('Post not founded', 404);
    }

    public function store(PostRequest $request) {
        $user = auth()->user();

        $image = $request->image_path;
        $extension = $image->extension();
        $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
        Storage::disk('frontend_img')->put($imageName, 'Posts');
        // $image->move(public_path('img/posts'), $imageName);

        $post = ['image_path' => $imageName, 'user_id' => $user->id,
        'description' => $request->description];

        return $this->postRepository->create($post);
    }

    public function like($id) {
        $user = auth()->user();

        return $this->postRepository->like($id, $user->id);
    }

    public function unlike($id) {
        $user = auth()->user();

        return $this->postRepository->unlike($id, $user->id);
    }
}
