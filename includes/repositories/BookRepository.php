<?php

namespace Includes\Repositories;

use Includes\Classes\DB;
use Includes\Classes\Request;

class BookRepository {

    private DB $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function getAllBooks(int $page, int $limit): ?array
    {
        $query = "SELECT 
                        b.id,
                        b.title,
                        b.resume,
                        b.full_description,
                        CONCAT(a.first_name, ' ', a.last_name) AS author,
                        b.cover_image_url AS cover_image,
                        b.hero_image_url AS hero_image,
                        b.price,
                        b.featured
                    FROM books b
                    INNER JOIN authors a
                    ON b.author_id = a.id
                    ORDER BY b.id";

        return $this->db->paginate(
            sql: $query,
            page: $page,
            limitForPage: $limit
        );
    }
}