<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\PostService;
use App\Interfaces\PostInterface;
use App\Http\Requests\PostRequest;
use Exception;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostInterface $postService) {
        $this->postService = $postService;
    }

    public function store(PostRequest $request) {
        try {
            $post = $this->postService->store($request);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'post created with success',
                    'status' => 'authorized',
                    'post' => $post
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }

    public function search($id) {
        try {
            $post = $this->postService->search($id);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'post finded with success',
                    'status' => 'authorized',
                    'post' => $post
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }

    public function like($id) {
        try {
            $post = $this->postService->like($id);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'post liked with success',
                    'status' => 'authorized',
                    'post' => $post
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }

    public function unlike($id) {
        try {
            $post = $this->postService->unlike($id);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'data' => [
                    'message' => 'post unliked with success',
                    'status' => 'authorized',
                    'post' => $post
                ]
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'data' => [
                    'message' => $ex->getMessage(),
                    'code' => $ex->getCode(),
                    'status' => 'unauthorized'
                ]
            ], $ex->getCode());
        }
    }
}
