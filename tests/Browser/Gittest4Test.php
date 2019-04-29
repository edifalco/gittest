<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Gittest4Test extends DuskTestCase
{

    public function testCreateGittest4()
    {
        $admin = \App\User::find(1);
        $gittest_4 = factory('App\Gittest4')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_4) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_4s.index'))
                ->clickLink('Add new')
                ->type("name", $gittest_4->name)
                ->press('Save')
                ->assertRouteIs('admin.gittest_4s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_4->name)
                ->logout();
        });
    }

    public function testEditGittest4()
    {
        $admin = \App\User::find(1);
        $gittest_4 = factory('App\Gittest4')->create();
        $gittest_42 = factory('App\Gittest4')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_4, $gittest_42) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_4s.index'))
                ->click('tr[data-entry-id="' . $gittest_4->id . '"] .btn-info')
                ->type("name", $gittest_42->name)
                ->press('Update')
                ->assertRouteIs('admin.gittest_4s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_42->name)
                ->logout();
        });
    }

    public function testShowGittest4()
    {
        $admin = \App\User::find(1);
        $gittest_4 = factory('App\Gittest4')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest_4) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_4s.index'))
                ->click('tr[data-entry-id="' . $gittest_4->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest_4->name)
                ->logout();
        });
    }

}
