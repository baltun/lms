<?php


namespace App\Services;


use App\Interfaces\TreeServiceInterface;
use App\Repositories\lessonsRepository;

class LessonsService
{
    private $lessonsRepository;

    public function __construct(lessonsRepository $lessonsRepository)
    {
        $this->lessonsRepository = $lessonsRepository;
    }

    public function all($request)
    {
        $lessons = $this->lessonsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $lessons;
    }
    public function getTree($request)
    {
        $lessons = $this->lessonsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        //do: добавляем в каждый лист дерева атрибут label, равный значению поля name
        foreach ($lessons as $lesson) {
            $lesson->label = $lesson->name;
        }

        $treeService = new TreeServiceAdjacencyListService();

        $lessonsTree = $treeService->getTreeFromList($lessons);
        $lessonsTree = array_values($lessonsTree);
//        dd($lessonsTree);

        return $lessonsTree;
    }


    public function getTreeLayer($parentId = null)
    {
        $lessonsTreeLayer = $this->lessonsRepository->getTreeLayerList(null);


        return $lessonsTreeLayer;
    }
}
