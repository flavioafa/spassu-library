<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $this
            ->actingAs($this->user)
            ->get('/livros')
            ->assertOk();
    }

    public function test_the_application_returns_a_successful_response_for_the_create_page(): void
    {
        $this
            ->actingAs($this->user)
            ->get('/livros/criar')
            ->assertOk();
    }
}
