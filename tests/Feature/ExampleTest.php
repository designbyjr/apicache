<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    
     /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->postJson('http://localhost:8000/api/create?api_token=430112CD58E1636DC35D4C6AB8FBBE23D540C0AAB8B55294D8E17C5BC0E97CDB',[
                "First_Name"=>"jamie",
                "Last_Name" => "gordon",
                "Email" => "oneugin@gmail.com",
                "Company" => 'dsdsd',
                "Post_Code"=> 'dodio',
                "Accept_Terms" => 1
        ]);

       
        $response->assertStatus(201)
        ->assertJsonStructure([
            "First_Name",
            "Last_Name",
            "Email",
            "Company",
            "Post_Code",
            "Accept_Terms",
        ]);
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRead()
    {
        $response = $this->get('http://localhost:8000/api/read?api_token=430112CD58E1636DC35D4C6AB8FBBE23D540C0AAB8B55294D8E17C5BC0E97CDB');


       
        $response->assertStatus(200)
            ->assertJsonStructure([0=>[
            "index",    
            "First_Name",
            "Last_Name",
            "Email",
            "Company",
            "Post_Code",
            "Accept_Terms",
        ]]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testupdate()
    {
        $response = $this->postJson('http://localhost:8000/api/update?api_token=430112CD58E1636DC35D4C6AB8FBBE23D540C0AAB8B55294D8E17C5BC0E97CDB',[
                "index" => 0,
                "First_Name"=>"jamie",
                "Last_Name" => "abced",
                "Email" => "gmail.com",
                "Company" => 'dsdsd',
                "Post_Code"=> 'dodio',
                "Accept_Terms" => 1
    ]);

       
        $response->assertStatus(200)
            ->assertJsonStructure([
            "index",    
            "First_Name",
            "Last_Name",
            "Email",
            "Company",
            "Post_Code",
            "Accept_Terms",
        ]);
    }

        /**
     * A basic test example.
     *
     * @return void
     */
    public function testDelete()
    {
        $response = $this->postJson('http://localhost:8000/api/delete?api_token=430112CD58E1636DC35D4C6AB8FBBE23D540C0AAB8B55294D8E17C5BC0E97CDB',[
                "index" => 1,

    ]);

       
        $response->assertStatus(200)
            ->assertJsonStructure([
            "data",    
        ]);
    }
}
