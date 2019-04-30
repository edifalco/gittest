<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class Gittest7Test extends DuskTestCase
{

    public function testCreateGittest7()
    {
        $admin = \App\User::find(1);
        $gittest_7 = factory('App\Gittest7')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_7) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_7s.index'))
                ->clickLink('Add new')
                ->type("name", $gittest_7->name)
                ->press('Save')
                ->assertRouteIs('admin.gittest_7s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_7->name)
                ->logout();
        });
    }

    public function testEditGittest7()
    {
        $admin = \App\User::find(1);
        $gittest_7 = factory('App\Gittest7')->create();
        $gittest_72 = factory('App\Gittest7')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $gittest_7, $gittest_72) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_7s.index'))
                ->click('tr[data-entry-id="' . $gittest_7->id . '"] .btn-info')
                ->type("name", $gittest_72->name)
                ->press('Update')
                ->assertRouteIs('admin.gittest_7s.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $gittest_72->name)
                ->logout();
        });
    }

    public function testShowGittest7()
    {
        $admin = \App\User::find(1);
        $gittest_7 = factory('App\Gittest7')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $gittest_7) {
            $browser->loginAs($admin)
                ->visit(route('admin.gittest_7s.index'))
                ->click('tr[data-entry-id="' . $gittest_7->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $gittest_7->name)
                ->logout();
        });
    }

}
