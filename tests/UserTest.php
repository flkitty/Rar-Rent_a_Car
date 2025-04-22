<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../PHP/User.php'; // adjust path based on where the file is

class UserTest extends TestCase
{
    private $sampleData;

    protected function setUp(): void
    {
        $this->sampleData = [
            'userid' => '12345',
            'first_name' => 'Faiza',
            'last_name' => 'Laskar',
            'email' => 'faiza@example.com',
            'password' => 'Secret123!'
        ];
    }

    public function testGetUserId()
    {
        $user = new User($this->sampleData);
        $this->assertEquals('12345', $user->getUserId());
    }

    public function testGetFirstName()
    {
        $user = new User($this->sampleData);
        $this->assertEquals('Faiza', $user->getFirstName());
    }

    public function testGetLastName()
    {
        $user = new User($this->sampleData);
        $this->assertEquals('Laskar', $user->getLastName());
    }

    public function testGetEmail()
    {
        $user = new User($this->sampleData);
        $this->assertEquals('faiza@example.com', $user->getEmail());
    }

    public function testEvaluateReturnsErrorWhenFieldsAreEmpty()
    {
        $signup = new Signup();
        $data = [
            'userid' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => ''
        ];
        $result = $signup->evaluate($data);

        $this->assertIsString($result);
        $this->assertStringContainsString("userid is empty!", $result);
        $this->assertStringContainsString("first_name is empty!", $result);
    }

    public function testEvaluateReturnsNullWhenDataIsValid()
{
    $signup = new Signup();
    
    $data = [
        'userid' => '12345',
        'first_name' => 'Faiza',
        'last_name' => 'Laskar',
        'email' => 'faiza@example.com',
        'password' => 'SecurePass123!'
    ];

    $result = $signup->evaluate($data);

    // We expect no errors, so result should be null
}

        
    
        // We expect no errors, so result should be null

}