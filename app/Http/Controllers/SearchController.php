<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SearchController extends Controller
{

    public function index(Request $request)
    {

        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            return view('search2', ['posts' => []])->with('keyword', $keyword);
        }

        $url = "https://www.googleapis.com/books/v1/volumes?q=".$keyword;
        $method = "GET";
        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        //        return view('search', ['posts' => $posts['items']]);
        return view('search2', ['posts' => $posts['items']])->with('keyword', $keyword);

        // $tag_id = "laravel";

        // $url = "https://qiita.com/api/v2/tags/" . $tag_id . "/items?page=1&per_page=20";
        // $method = "GET";

        // //接続
        // $client = new Client();

        // $response = $client->request($method, $url);

        // $posts = $response->getBody();
        // $posts = json_decode($posts, true);

        // return view('search2', ['posts' => []]);
    }

    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $tag_id = "laravel";

        $url = "https://qiita.com/api/v2/tags/" . $tag_id . "/items?page=1&per_page=20";
        $method = "GET";

        $url = "https://www.googleapis.com/books/v1/volumes?q=歌丸";
        $url = "https://www.googleapis.com/books/v1/volumes?q=ワールドトリガー";
        $url = "https://www.googleapis.com/books/v1/volumes?q=魔法科高校の劣等生";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        //        return view('search', ['posts' => $posts['items']]);
        return view('search2', ['posts' => $posts['items']])->with('keyword', $keyword);
    }
}
