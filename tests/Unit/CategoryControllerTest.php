<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;
use Furbook\Category;

class CategoryControllerTest extends TestCase
{
    // thuc hien truoc moi function test
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }

    // thuc hien sau khi ket thuc function test
    public function tearDown()
    {
        Artisan::call('migrate:refresh');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testApiCreateCategory()
    {
      $data = ['name' => 'Hoang Vu'];

      $response = $this->json('POST', '/categories', $data);
      $content = json_decode($response->getContent());
      $code = $response->getStatusCode();

      $this->assertEquals($code, 200);
      $this->assertEquals($content->name, $data['name']);
      $this->assertEquals(Category::count(), 1);
    }

    public function testGetAllCategies()
    {
      // test no data on db
      $response = $this->json('GET', '/categories');
      $content = json_decode($response->getContent());
      $code = $response->getStatusCode();
      $this->assertEquals($content, []);

      // test have data on db
      $data = ['name' => 'Hoang Vu'];
      $response = $this->json('POST', '/categories', $data);

      $response = $this->json('GET', '/categories');
      $content = json_decode($response->getContent());
      $code = $response->getStatusCode();
      $this->assertEquals(count($content), 1);
      $this->assertEquals($code, 200);

      $data = ['name' => 'Hoang Vu'];
      $response = $this->json('POST', '/categories', $data);

      $response = $this->json('GET', '/categories');
      $content = json_decode($response->getContent());
      $code = $response->getStatusCode();
      $this->assertEquals(count($content), 2);
      $this->assertEquals($code, 200);
    }

    public function testApiUpdate()
    {
      // create data
      $data = ['name' => 'Hoang Vu'];
      $response = $this->json('POST', '/categories', $data);
      $content = json_decode($response->getContent());

      $response = $this->json('PATCH', '/categories/' . $content->id, [
        'name' => 'Hoang Vu 1'
      ]);
      $code = $response->getStatusCode();
      $content = json_decode($response->getContent());
      $this->assertEquals($code, 200);
      $this->assertEquals($content->name, 'Hoang Vu 1');
    }
}
