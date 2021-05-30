<?php

namespace App\Services;

use App\Interfaces\TreeServiceInterface;


class TreeServiceAdjacencyListService implements TreeServiceInterface
{
    private $list;
    private $tree;

    public function __construct()
    {
    }
    public function getTreeFromList($list) : array
    {
        $this->list = $list;

        $this->tree = $this->getChildrenOfLeaf(null);
        $this->tree = $this->tree->keyBy('id');
        $this->tree = $this->tree->toArray();
        foreach ( $this->tree as $leaf) {
            $this->addChildrenToLeaf($leaf['id']);
        }

        return $this->tree;

    }

    private function addChildrenToLeaf($parentLeafId)
    {
        $children = $this->getChildrenOfLeaf($parentLeafId);
        if ($children->count()) {
            $this->tree[$parentLeafId]['children'] = $children->toArray();
        }
        foreach ($children as $childLeaf) {
            $this->addChildrenToLeaf($childLeaf['id']);
        }
    }

    private function getChildrenOfLeaf($leafId)
    {
        $children = $this->list->where('parent_id', $leafId);

        return $children;
    }

//    private function addChildLevelToParentLeafs($flatList, $)
//    {
//
//    }
    public function createLeaf($parent_id, array $leafData): int
    {

    }

    public function deleteLeaf($id)
    {

    }
}
