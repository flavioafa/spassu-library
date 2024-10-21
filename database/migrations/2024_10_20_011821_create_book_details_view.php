<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS book_details');
        DB::statement(
            'CREATE VIEW book_details AS
                    SELECT
                        b.id AS book_id,
                        b.title AS book_title,
                        b.publisher AS book_publisher,
                        b.price AS book_price,
                        b.edition AS book_edition,
                        b.publication_year AS book_publication_year,
                        a.id AS author_id,
                        a.name AS author_name,
                        s.id as subject_id,
                        s.description AS subject_description
                    FROM
                        books b
                    JOIN
                        author_book ab ON b.id = ab.book_id
                    JOIN
                        authors a ON a.id = ab.author_id
                    JOIN
                        book_subject bs ON b.id = bs.book_id
                    JOIN
                        subjects s ON s.id = bs.subject_id'
        );
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS book_details');
    }
};
