<?php

namespace DarkMatter\Tests\Unit\Router;

use DarkMatter\Payload\Payload;
use DarkMatter\Payload\Status;
use PHPUnit\Framework\TestCase;

class PayloadTest extends TestCase
{
    public function testDispatch()
    {
        $data = [
            'body' => 'foo, baz, bar'
        ];

        $payload = Payload::found($data);

        $this->assertIsObject($payload);
        $this->assertIsArray($payload->getResult());
        $this->assertIsString($payload->getStatus());
        $this->assertEquals($payload->getStatus(), 'FOUND');

        $this->assertEquals($payload->getResult(), $data);

        $this->assertIsString($payload->getStatus(['body']));

        // $this->assertEquals($payload->getResult(['body']), $data['body']);


        $payload = Payload::notFound($data);

        $this->assertIsObject($payload);
        $this->assertIsArray($payload->getResult());
        $this->assertIsString($payload->getStatus());
        $this->assertEquals($payload->getStatus(), 'NOT_FOUND');

    }
}
