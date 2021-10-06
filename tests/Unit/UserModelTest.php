<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function user_has_full_name_attribute()
    {
        
        $user = User::create([
            'name'      => 'Habibur Rahaman Raju',
            'email'     => 'raju1@bs23.com',
            'password'  => '12345678'
        ]);


        $this->assertEquals('Habibur Rahaman Raju',$user->name);
    }

    public function test_user_has_email_attribute()
    {
        
        $user = User::create([
            'name'      => 'Habibur Rahaman Raju',
            'email'     => 'raju1@bs23.com',
            'password'  => '12345678'
        ]);

        $this->assertEquals('raju1@bs23.com',$user->email);
    }
}
