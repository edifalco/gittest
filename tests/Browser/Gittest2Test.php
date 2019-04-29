<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Gittest2Test extends DuskTestCase
{

    public function testCreateGittest2()
    {
        $admin = \App\User::find(1);
        $gittest2 = factory('App\Gittest2')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest2) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest2s.index'))
                ->clickLink('Add new')
                ->type("name", $gittest2->name)
                ->press('Save')
                ->assertRouteIs('admin.gittest2s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest2->name)
                ->logout();
        });
    }

    public function testEditGittest2()
    {
        $admin = \App\User::find(1);
        $gittest2 = factory('App\Gittest2')->create();
        $gittest22 = factory('App\Gittest2')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest2, $gittest22) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest2s.index'))
                ->click('tr[data-entry-id="' . $gittest2->id . '"] .btn-info')
                ->type("name", $gittest22->name)
                ->press('Update')
                ->assertRouteIs('admin.gittest2s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest22->name)
                ->logout();
        });
    }

    public function testShowGittest2()
    {
        $admin = \App\User::find(1);
        $gittest2 = factory('App\Gittest2')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest2) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest2s.index'))
                ->click('tr[data-entry-id="' . $gittest2->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest2->name)
                ->logout();
        });
    }

}
