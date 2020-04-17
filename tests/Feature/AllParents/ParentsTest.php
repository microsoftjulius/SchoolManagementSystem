<?php

namespace Tests\Feature\AllParents;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\UsersPackage\Parentsmodel as Parents;

class ParentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createParent(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-parent',[
            'first_name'    => 'Jane',
            'last_name'     => 'Nabuyondo',
            'date_of_birth' => '10/10/1994',
            'image'         => 'images/path',
            'RelationShip'  => 'Mother',
            'District'      => 'Kampala',
            'Village'       => 'Nansana',
            'NIN'           => 'CMP323124RE2',
            'Telephone'     => '256777630441',
        ]);
        $this->assertDatabaseHas('parents',['pfirst_name'=>'Jane']);
    }

    /** @test */
    public function editParent(){
        $this->createParent();
        $parent = Parents::first();
        $response = $this->patch('/edit-parent/'.$parent->id,[
            'pfirst_name' => 'Joan',
        ]);
        $this->assertEquals('Joan',Parents::first()->pfirst_name);
    }

    /**@test */
    public function getAllParents(){
        $this->createParent();
        $response = $this->get('/get-all-parents');
        $this->assertCount(1,Parents::all());
    }

    /**@test */
    public function getParticularParent(){
        $this->createParent();
        $parent = Parents::first();
        $response = $this->get('/get-particular-parent/'.$parent->id);
        $response->assertOk();
    }
}
