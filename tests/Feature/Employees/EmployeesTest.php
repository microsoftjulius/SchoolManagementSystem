<?php

namespace Tests\Feature\Employees;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\UsersPackage\Employeesmodel as Employee;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createEmployee(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-employee',[
            'first_name'         => 'Ruth',
            'last_name'          => 'Namakula',
            'date_of_birth'      => '10/10/1993',
            'image'              => 'images/path',
            'District'           => 'Kampala',
            'Village'            => 'Nansana',
            'NIN'                => 'CMP323124RE2',
            'Telephone'          => '256777630441',
            'role_id'            => '5',
            'level_of_education' => 'S6',
            'certificates'       => ['path one','path two','Part three']
        ]);
        $this->assertDatabaseHas('employees',['first_name'=>'Ruth']);
    }

    /** @test */
    public function editEmployee(){
        $this->createEmployee();
        $employee = Employee::first();
        $response = $this->patch('/edit-employee/'.$employee->id,[
            'first_name' => 'Joan',
        ]);
        $this->assertEquals('Joan',Employee::first()->first_name);
    }

    /** @test */
    public function getAllEmployees(){
        $this->createEmployee();
        $response = $this->get('/get-all-employees');
        $this->assertCount(1,Employee::all());
    }

    /** @test */
    public function suspendEmployee(){
        $this->createEmployee();
        $employee = Employee::first();
        $response = $this->patch('/suspend-employee/'.$employee->id,[
            'status' => 'suspended'
        ]);
        $this->assertEquals('suspended',Employee::first()->status);
    }

    /** @test */
    public function ExpelEmployee(){
        $this->createEmployee();
        $employee = Employee::first();
        $response = $this->patch('/expel-employee/'.$employee->id,[
            'status' => 'expelled'
        ]);
        $this->assertEquals('expelled',Employee::first()->status);
    }

    /** @test */
    public function assignRole(){
        $this->createEmployee();
        $employee = Employee::first();
        $response = $this->patch('/assign-role-to-employee/'.$employee->id,[
            'role_id' => '4'
        ]);
        $this->assertEquals('4',Employee::first()->role_id);
    }

    /** @test */
    public function getParticularEmployee(){
        $this->createEmployee();
        $employee = Employee::first();
        $response = $this->get('/get-particular-employee/'.$employee->id);
        $response->assertOk();
    }
}
