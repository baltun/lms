<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelessonsAPIRequest;
use App\Http\Requests\API\UpdatelessonsAPIRequest;
use App\Models\lessons;
use App\Repositories\lessonsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\lessonsResource;
use Response;

/**
 * Class lessonsController
 * @package App\Http\Controllers\API
 */

class lessonsAPIController extends AppBaseController
{
    /** @var  lessonsRepository */
    private $lessonsRepository;

    public function __construct(lessonsRepository $lessonsRepo)
    {
        $this->lessonsRepository = $lessonsRepo;
    }

    /**
     * Display a listing of the lessons.
     * GET|HEAD /lessons
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $lessons = $this->lessonsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(lessonsResource::collection($lessons), 'Lessons retrieved successfully');
    }

    /**
     * Store a newly created lessons in storage.
     * POST /lessons
     *
     * @param CreatelessonsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatelessonsAPIRequest $request)
    {
        $input = $request->all();

        $lessons = $this->lessonsRepository->create($input);

        return $this->sendResponse(new lessonsResource($lessons), 'Lessons saved successfully');
    }

    /**
     * Display the specified lessons.
     * GET|HEAD /lessons/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var lessons $lessons */
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            return $this->sendError('Lessons not found');
        }

        return $this->sendResponse(new lessonsResource($lessons), 'Lessons retrieved successfully');
    }

    /**
     * Update the specified lessons in storage.
     * PUT/PATCH /lessons/{id}
     *
     * @param int $id
     * @param UpdatelessonsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelessonsAPIRequest $request)
    {
        $input = $request->all();

        /** @var lessons $lessons */
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            return $this->sendError('Lessons not found');
        }

        $lessons = $this->lessonsRepository->update($input, $id);

        return $this->sendResponse(new lessonsResource($lessons), 'lessons updated successfully');
    }

    /**
     * Remove the specified lessons from storage.
     * DELETE /lessons/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var lessons $lessons */
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            return $this->sendError('Lessons not found');
        }

        $lessons->delete();

        return $this->sendSuccess('Lessons deleted successfully');
    }
}
