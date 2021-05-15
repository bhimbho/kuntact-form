<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithoutMiddleware;
    public function test_check_email_name_msg_field_are_filled()
    {
        $this->withExceptionHandling();
        $response = $this->post('/contact-form', [
            'message' => 'Hello',
            'fullname' => 'Soneye Oluwasina Abimbola',
            'email' => 'advancoplanet@gmail.com'
        ]);
        $response->assertSessionHasNoErrors(['message']);
    }

    public function test_uploaded_file()
    {
        Storage::fake('uploaded_files');
        $file = UploadedFile::fake()->image('test_file.pdf'); //accept files xlsx, pdf,csv
        $response = $this->post('/contact-form', [
            'message' => 'Hello',
            'fullname' => 'Soneye Oluwasina Abimbola',
            'email' => 'advancoplanet@gmail.com',
            'upload_file' => $file 
        ]);
        $response->assertSessionHasNoErrors(['upload_file']);
    }
}
