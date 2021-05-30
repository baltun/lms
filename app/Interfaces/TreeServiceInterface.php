<?php


namespace App\Interfaces;



interface TreeServiceInterface
{
    public function getTreeFromList($list): array;

    public function createLeaf($parent_id, array $leafData): int;

    public function deleteLeaf($id);
}
