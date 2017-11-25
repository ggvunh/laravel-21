<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Furbook\Math;
use Furbook\Cat;
use Artisan;

class MathTest extends TestCase
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

    public function testSumNumber()
    {
      // step 1 prepare data;
      $a = 4;
      $b = 5;
      $result = 9;
      // step 2 exe function
      $sum = Math::sumNumber($a, $b);
      $this->assertEquals($result, $sum);
    }

    public function testCreateCat()
    {
      // step 1
      $data  = [
        'name' => 'Tom',
        'date_of_birth' => '1991-01-01'
      ];

      // step 2
      $cat = Cat::create($data);

      // step 3
      $catFromDb = Cat::find($cat->id);

      $this->assertEquals($catFromDb->name, $data['name']);
      $this->assertEquals($catFromDb->date_of_birth, $data['date_of_birth']);
      $this->assertEquals($catFromDb->name, 'Tom');
      $this->assertEquals($catFromDb->date_of_birth, '1991-01-01');
      $this->assertEquals($catFromDb->breed_id, null);

      $count = Cat::count();
      $this->assertEquals($count, 1);

      $cat = Cat::create($data);
      $count = Cat::count();
      $this->assertEquals($count, 2);

      $cat = Cat::create($data);
      $count = Cat::count();
      $this->assertEquals($count, 3);
    }
}
