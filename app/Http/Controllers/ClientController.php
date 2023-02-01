<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{

    /**
     * Show all clients from external API.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $response = Http::get('http://substantiveresearch.pythonanywhere.com/');
        $jsonData = (json_decode($response->body()));
        
        $nameCounts = [];
        foreach ($jsonData as $record) {
            if (!isset($nameCounts[$record->name])) {
                $nameCounts[$record->name] = 0;
            }
            $nameCounts[$record->name]++;
        }
        
        $totalRecords = count($jsonData);
        foreach ($jsonData as &$record) {
            $record->percent = ($nameCounts[$record->name] / $totalRecords) * 100;
        }

        if($request->search) {
            $search = '*'.$request->search.'*';

            $jsonData = array_filter($jsonData, function($jsonData) use ($search) {
                return fnmatch($search, $jsonData->name);
            });

        }

        return view('welcome', [
            'clients' => $jsonData
        ]);
    }
}