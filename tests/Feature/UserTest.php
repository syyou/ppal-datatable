<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testExample()
    {
        $student = new User([
            'name' =>'SY',
            'email' =>'student@example.com'
        ]);
        $this->assertEquals('SY', $student->name);

    }

    public function testUserCreation()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/');
    }

/*
 * Available Assertions
 * $this->assertDatabaseHas($table, array $data);
 * $this->assertDatabaseMissing($table, array $data);
 * $this->assertSoftDeleted($table, array $data);
 */
    public function testDatabase()
    {
        // Create in DB a single App\User
        $user = factory(User::class)->create();
        $this->assertDatabaseHas('users', array('id'=>1));
        $this->assertDatabaseMissing('users', array('id'=>100));

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/');
    }


}
