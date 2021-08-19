<?php

namespace App\Http\Classes;

class TransformTree
{
    public function transform($treeArray, $parentId): array
    {
        $output = [];

        // Read through all nodes of the tree
        foreach ($treeArray as $node) {
            // If the node parent is same as parent passed in argument
            if ($node['parent'] === $parentId) {

                // Get all the children for that node, using recursive method
                $children = transform($treeArray, $node['id']);

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
}
