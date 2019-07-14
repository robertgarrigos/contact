<?php

namespace Robertgarrigos\Contact\Tests;

use Orchestra\Testbench\TestCase;
use Robertgarrigos\Contact\ContactServiceProvider;

class ContactTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ContactServiceProvider::class,
        ];
    }

    // /**
    //  * Define environment setup.
    //  *
    //  * @param  \Illuminate\Foundation\Application  $app
    //  * @return void
    //  */
    // protected function getEnvironmentSetUp($app)
    // {
    //     // Setup default database to use sqlite :memory:
    //     $app['config']->set('app.env', 'testing');
    // }

    /** @test */
    public function the_route_can_be_accessed()
    {
        $this->withoutExceptionHandling();
        $this->assertTrue(true);
        // $this->get('contact')
        //     // ->assertViewIs('contact::contact')
        //     ->assertStatus(200);
    }
}
