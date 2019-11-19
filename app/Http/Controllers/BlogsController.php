<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class BlogsController extends Controller
{
    function seeAllBlogs(){

      $blogsIds = $this->getData('topstories.json?print=pretty');
      $blogs = [];


      $count = 0;
      foreach ($blogsIds as $blogId) {
        $count++;
        $blog = $this->getData('item/' . $blogId . '.json?print=pretty');
        $blogs[] = $blog;
        if($count>5){break;}
       }

       return view('blogs', compact('blogs'));
     }

    function getData($url){
      $client = new Client();
      $response = $client->request('GET', 'https://hacker-news.firebaseio.com/v0/item' . $url);
      $dataJson = $response->getBody()->getContents();
      $data = json_decode($dataJson);
      return $data;
    }
}
