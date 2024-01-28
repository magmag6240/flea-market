<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class Tests extends TestCase
{
    use RefreshDatabase;

    public function testHello()
    {
        User::factory()->create([
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);
        $this->assertDatabaseHas('users',[
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);
    }
}
