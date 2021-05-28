<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\lessons;

class lessonsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_lessons()
    {
        $lessons = factory(lessons::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/lessons', $lessons
        );

        $this->assertApiResponse($lessons);
    }

    /**
     * @test
     */
    public function test_read_lessons()
    {
        $lessons = factory(lessons::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/lessons/'.$lessons->id
        );

        $this->assertApiResponse($lessons->toArray());
    }

    /**
     * @test
     */
    public function test_update_lessons()
    {
        $lessons = factory(lessons::class)->create();
        $editedlessons = factory(lessons::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/lessons/'.$lessons->id,
            $editedlessons
        );

        $this->assertApiResponse($editedlessons);
    }

    /**
     * @test
     */
    public function test_delete_lessons()
    {
        $lessons = factory(lessons::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/lessons/'.$lessons->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/lessons/'.$lessons->id
        );

        $this->response->assertStatus(404);
    }
}
