<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GittestTest extends DuskTestCase
{

    public function testCreateGittest()
    {
        $admin = \App\User::find(1);
        $gittest = factory('App\Gittest')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittests.index'))
                ->clickLink('Add new')
                ->type("name", $gittest->name)
                ->press('Save')
                ->assertRouteIs('admin.gittests.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest->name)
                ->logout();
        });
    }

    public function testEditGittest()
    {
        $admin = \App\User::find(1);
        $gittest = factory('App\Gittest')->create();
        $gittest2 = factory('App\Gittest')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest, $gittest2) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittests.index'))
                ->click('tr[data-entry-id="' . $gittest->id . '"] .btn-info')
                ->type("name", $gittest2->name)
                ->press('Update')
                ->assertRouteIs('admin.gittests.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest2->name)
                ->logout();
        });
    }

    public function testShowGittest()
    {
        $admin = \App\User::find(1);
        $gittest = factory('App\Gittest')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittests.index'))
                ->click('tr[data-entry-id="' . $gittest->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest->name)
                ->logout();
        });
    }

}
