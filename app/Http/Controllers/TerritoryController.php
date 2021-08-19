<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TerritoryController extends Controller
{
    public function transformTree($treeArray, $parentId = null)
    {
        $output = [];

        // Read through all nodes of the tree
        foreach ($treeArray as $node) {
            // If the node parent is same as parent passed in argument
            if ($node['parent'] === $parentId) {

                // Get all the children for that node, using recursive method
                $children = $this->transformTree($treeArray, $node['id']);

                // If children are found, add it to the node children array
                if ($children) {
                    $node['children'] = $children;
                }

                // Add the main node with/without children to the main output
                $output[] = $node;

                // Remove the node from main array to avoid duplicate reading, speed up the process
                unset($node);
            }
        }
        return $output;
    }

    public function index()
    {
        $response = Http::get('https://netzwelt-devtest.azurewebsites.net/Territories/All');
        $output = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

        return view('index', ['territories' => $this->transformTree($output['data'])]);
    }
}
