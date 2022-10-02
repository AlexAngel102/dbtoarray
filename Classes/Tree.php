<?php

namespace App;

class Tree
{
    private array $array = [];

    public function prepareResult(array $arrOfCategories): array
    {
        $result = [];
        foreach ($arrOfCategories as $cats) {
            $catId = $cats['categories_id'];
            $parId = $cats['parent_id'];
            $result[$catId] = $parId;
        }
        return $this->array = $result;
    }

    public function makeTree(array $categories = [], int $parentId = 0): array
    {
        if (isset($this->array) && is_array($this->array)){
            $categories = $this->array;
        }
        $tree = [];
        foreach ($categories as $key => $category) {
            if ($category == $parentId) {
                $parent = $this->makeTree($categories, $key);
                if ($parent) {
                    $cat = $parent;
                } else {
                    $cat = $key;
                }
                $tree[$key] = $cat;
            }
        }
        return $tree;
    }

}