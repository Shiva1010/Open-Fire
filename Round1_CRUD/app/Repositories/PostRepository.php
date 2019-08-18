<?php

namespace App\Repositories;      // namespace 宣告該檔案的命名空間，不可打錯，否則會發生找不到檔案的錯誤

use App\Entities\Post;

class PostRepository
{
    public function index()
    {
        return Post::with('user')->get();
    }

    public function find($id)
    {
        return Post::with('user')->find($id);
    }

    public function delete($id)
    {
        return Post::destroy($id);
    }

    public function create(array $data)
    {
        return auth()->user()->posts()->create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::find($id);
        return $post ? $post->update($data) : false;
    }

}
