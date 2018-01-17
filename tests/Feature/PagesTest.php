<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;

/**
 * Class LoggedInFormTest.
 */
class LoggedInFormTest extends BrowserKitTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->visit('/pages')
              ->seePageIs('/pages')
                 ->see('Pages');

        // check the seeded data exists on database
        dump(\DB::table('pages')->get());

        // Check that existing roles has properly
        // passed to the view on checkboxes
        $this->dump();
    }
}
