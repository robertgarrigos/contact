<?php

namespace Robertgarrigos\Contact\Tests;

use Tests\TestCase;
// use Robertgarrigos\Contact\ContactServiceProvider;

class ContactTest extends TestCase
{
    // protected function getPackageProviders($app)
    // {
    //     return [
    //         ContactServiceProvider::class,
    //     ];
    // }


    /** @test */
    public function the_route_can_be_accessed()
    {
        $this->get('contact')
            ->assertViewIs('contact::contact')
            ->assertStatus(200);
    }
}
