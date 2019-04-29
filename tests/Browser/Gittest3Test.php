<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Gittest3Test extends DuskTestCase
{

    public function testCreateGittest3()
    {
        $admin = \App\User::find(1);
        $gittest3 = factory('App\Gittest3')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest3) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest3s.index'))
                ->clickLink('Add new')
                ->type("name", $gittest3->name)
                ->press('Save')
                ->assertRouteIs('admin.gittest3s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest3->name)
                ->logout();
        });
    }

    public function testEditGittest3()
    {
        $admin = \App\User::find(1);
        $gittest3 = factory('App\Gittest3')->create();
        $gittest32 = factory('App\Gittest3')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest3, $gittest32) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest3s.index'))
                ->click('tr[data-entry-id="' . $gittest3->id . '"] .btn-info')
                ->type("name", $gittest32->name)
                ->press('Update')
                ->assertRouteIs('admin.gittest3s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest32->name)
                ->logout();
        });
    }

    public function testShowGittest3()
    {
        $admin = \App\User::find(1);
        $gittest3 = factory('App\Gittest3')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest3) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest3s.index'))
                ->click('tr[data-entry-id="' . $gittest3->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest3->name)
                ->logout();
        });
    }

}
