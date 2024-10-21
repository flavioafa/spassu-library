<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Subject;
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

    public function test_the_application_returns_a_successful_response_for_the_store(): void
    {
        $book = Book::factory()->make()->toArray();

        $book['subjects'] = Subject::query()
            ->select('id')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->pluck('id')
            ->toArray();
        $book['authors'] = Author::query()
            ->select('id')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->pluck('id')
            ->toArray();

        $this
            ->actingAs($this->user)
            ->post('/livros', $book)
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', ['title' => $book['title']]);
    }

    public function test_the_application_returns_a_successful_response_for_the_update(): void
    {
        /** @var Book $book */
        $book = Book::factory()->create();

        $book['subjects'] = Subject::query()
            ->select('id')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->pluck('id')
            ->toArray();
        $book['authors'] = Author::query()
            ->select('id')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->pluck('id')
            ->toArray();

        $book->title = 'Updated Title';

        $this
            ->actingAs($this->user)
            ->put("/livros/$book->id", $book->toArray())
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseHas('books', ['title' => $book['title']]);
    }

    public function test_the_application_returns_a_successful_response_for_the_show(): void
    {
        /** @var Book $book */
        $book = Book::factory()->create();

        $this
            ->actingAs($this->user)
            ->get("/livros/$book->id")
            ->assertOk();
    }

    public function test_the_application_returns_a_successful_response_for_the_report(): void
    {
        /** @var Book $book */
        $book = Book::factory()->create();

        $book->authors()->attach(Author::factory()->create());
        $book->subjects()->attach(Subject::factory()->create());

        $this
            ->actingAs($this->user)
            ->get("/livros/$book->id/relatorio")
            ->assertDownload('relatorio.pdf');
    }
}
