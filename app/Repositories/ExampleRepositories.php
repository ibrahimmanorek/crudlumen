<?php

namespace App\Repositories;
use DB;
use GuzzleHttp\Client;
use Intervention\Image\ImageManagerStatic as Image;

class ExampleRepositories
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
    }

    public function getData()
    {
        $results = DB::select("select id, name, email, phone_number from user ");
        return $results;
    }

    public function updateData($request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $id = $request->input('id');

        $results = DB::table('user')->where('id', $id)->update(
            ['name' => $nama, 'email' => $email, 'phone_number' => $phone ]
        );

        if($results == 1){
            $results = response()->json(['ack' => 'OK', 'status_code' => '00']);
        }
        else{
            $results = response()->json(['ack' => 'NOK', 'status_code' => '01']);
        }

        return $results;
    }

    public function insertData($request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $results = DB::table('user')->insert(
            ['name' => $nama, 'email' => $email, 'phone_number' => $phone]
        );

        if($results == 1){
            $results = response()->json(['ack' => 'OK', 'status_code' => '00']);
        }
        else{
            $results = response()->json(['ack' => 'NOK', 'status_code' => '01']);
        }

        return $results;
    }

    public function deleteData($id){
        $results = DB::table('user')->where('id', $id)->delete();

        if($results == 1){
            $results = response()->json(['ack' => 'OK', 'status_code' => '00']);
        }
        else{
            $results = response()->json(['ack' => 'NOK', 'status_code' => '01']);
        }
        return $results;
    }

    public function getApi()
    {
        $client   = new Client();

        $url = 'https://randomfox.ca/floof/';
        $response = $client->get($url);

        $response = json_decode($response->getBody()->getContents(), true);
        $image = $response['image'];
        $link = $response['link'];

        $filename = basename($image);

        Image::make($image)->save('public' . $filename);

        $results = DB::table('api')->insert(
            ['image' => $image, 'link' => $link]
        );

        if($results == 1){
            $results = response()->json(['ack' => 'OK', 'status_code' => '00']);
        }
        else{
            $results = response()->json(['ack' => 'NOK', 'status_code' => '01']);
        }

        return $results;
        
    }

}
