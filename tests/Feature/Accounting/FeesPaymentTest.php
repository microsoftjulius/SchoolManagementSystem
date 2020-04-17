<?php

namespace Tests\Feature\Accounting;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\AccountingsModel\Fees;
use Tests\TestCase;

class FeesPaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createFeesPayment(){
        $this->withoutExceptionHandling();
        $response = $this->post('/make-fees-payment',[
            'student_id' => 1,
            'term_id'    => 1,
            'amount'     => 250000,
            'created_by' => 1
        ]);
        $this->assertDatabaseHas('fees',['student_id'=>1]);
    }

        /** @test */
    public function updateFeesPayment(){
        $this->createFeesPayment();
        $fees = Fees::first();
        $response = $this->patch('/edit-fees-payment/'.$fees->id,[
            'student_id' => 1,
            'term_id'    => 1,
            'amount'     => 270000,
            'created_by' => 1
        ]);
        $this->assertEquals(270000, Fees::first()->amount);
    }
        /**@test */
    public function getAllFeesPayments(){
        $this->createFeesPayment();
        $response = $this->get('/get-all-fees-payments');
        $response->assertOk();
    }
        /**@test */
    public function getFeesForOneIndividual(){
        $this->createFeesPayment();
        $fees = Fees::first();
        $response = $this->get('/get-fees-for-particular-student/'.$fees->id);
        $response->assertOk();
    }
}
