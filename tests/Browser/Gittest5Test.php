<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Gittest5Test extends DuskTestCase
{

    public function testCreateGittest5()
    {
        $admin = \App\User::find(1);
        $gittest_5 = factory('App\Gittest5')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_5) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_5s.index'))
                ->clickLink('Add new')
                ->type("name", $gittest_5->name)
                ->press('Save')
                ->assertRouteIs('admin.gittest_5s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_5->name)
                ->logout();
        });
    }

    public function testEditGittest5()
    {
        $admin = \App\User::find(1);
        $gittest_5 = factory('App\Gittest5')->create();
        $gittest_52 = factory('App\Gittest5')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_5, $gittest_52) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_5s.index'))
                ->click('tr[data-entry-id="' . $gittest_5->id . '"] .btn-info')
                ->type("name", $gittest_52->name)
                ->press('Update')
                ->assertRouteIs('admin.gittest_5s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_52->name)
                ->logout();
        });
    }

    public function testShowGittest5()
    {
        $admin = \App\User::find(1);
        $gittest_5 = factory('App\Gittest5')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest_5) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_5s.index'))
                ->click('tr[data-entry-id="' . $gittest_5->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest_5->name)
                ->logout();
        });
    }

}
