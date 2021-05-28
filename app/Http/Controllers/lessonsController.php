<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelessonsRequest;
use App\Http\Requests\UpdatelessonsRequest;
use App\Repositories\lessonsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class lessonsController extends AppBaseController
{
    /** @var  lessonsRepository */
    private $lessonsRepository;

    public function __construct(lessonsRepository $lessonsRepo)
    {
        $this->lessonsRepository = $lessonsRepo;
    }

    /**
     * Display a listing of the lessons.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lessons = $this->lessonsRepository->all();

        return view('lessons.index')
            ->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new lessons.
     *
     * @return Response
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created lessons in storage.
     *
     * @param CreatelessonsRequest $request
     *
     * @return Response
     */
    public function store(CreatelessonsRequest $request)
    {
        $input = $request->all();

        $lessons = $this->lessonsRepository->create($input);

        Flash::success('Lessons saved successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified lessons.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons.show')->with('lessons', $lessons);
    }

    /**
     * Show the form for editing the specified lessons.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        return view('lessons.edit')->with('lessons', $lessons);
    }

    /**
     * Update the specified lessons in storage.
     *
     * @param int $id
     * @param UpdatelessonsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelessonsRequest $request)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        $lessons = $this->lessonsRepository->update($request->all(), $id);

        Flash::success('Lessons updated successfully.');

        return redirect(route('lessons.index'));
    }

    /**
     * Remove the specified lessons from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lessons = $this->lessonsRepository->find($id);

        if (empty($lessons)) {
            Flash::error('Lessons not found');

            return redirect(route('lessons.index'));
        }

        $this->lessonsRepository->delete($id);

        Flash::success('Lessons deleted successfully.');

        return redirect(route('lessons.index'));
    }
}
