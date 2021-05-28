<?php namespace Tests\Repositories;

use App\Models\lessons;
use App\Repositories\lessonsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class lessonsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var lessonsRepository
     */
    protected $lessonsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->lessonsRepo = \App::make(lessonsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_lessons()
    {
        $lessons = factory(lessons::class)->make()->toArray();

        $createdlessons = $this->lessonsRepo->create($lessons);

        $createdlessons = $createdlessons->toArray();
        $this->assertArrayHasKey('id', $createdlessons);
        $this->assertNotNull($createdlessons['id'], 'Created lessons must have id specified');
        $this->assertNotNull(lessons::find($createdlessons['id']), 'lessons with given id must be in DB');
        $this->assertModelData($lessons, $createdlessons);
    }

    /**
     * @test read
     */
    public function test_read_lessons()
    {
        $lessons = factory(lessons::class)->create();

        $dblessons = $this->lessonsRepo->find($lessons->id);

        $dblessons = $dblessons->toArray();
        $this->assertModelData($lessons->toArray(), $dblessons);
    }

    /**
     * @test update
     */
    public function test_update_lessons()
    {
        $lessons = factory(lessons::class)->create();
        $fakelessons = factory(lessons::class)->make()->toArray();

        $updatedlessons = $this->lessonsRepo->update($fakelessons, $lessons->id);

        $this->assertModelData($fakelessons, $updatedlessons->toArray());
        $dblessons = $this->lessonsRepo->find($lessons->id);
        $this->assertModelData($fakelessons, $dblessons->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_lessons()
    {
        $lessons = factory(lessons::class)->create();

        $resp = $this->lessonsRepo->delete($lessons->id);

        $this->assertTrue($resp);
        $this->assertNull(lessons::find($lessons->id), 'lessons should not exist in DB');
    }
}
