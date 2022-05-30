<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class S3TxtTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGeneral(): void
    {
        $data = 'テスト用Contentsです';
        Storage::fake('s3');
        Storage::disk('s3')->put('s3_sample.txt', $data);

        $response = $this->get('/s3/txt');

        $response->assertStatus(200)
            ->assertSee('Contents')
            ->assertViewIs('s3.index')
            ->assertViewHasAll([
                'data' => $data,
            ]);
    }
}
