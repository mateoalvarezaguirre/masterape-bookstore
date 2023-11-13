<?php

namespace Includes\Classes;

class Book {

    private DB $db;

    public function __construct() {
        $this->db = new DB;
    }

    function getAllBooks(): void
    {   
    
        try {

            $page = Request::present('page') ?: 1;
            $limit = Request::present('limit') ?: 10;

            $query = "SELECT 
                        b.id,
                        b.title,
                        b.resume,
                        CONCAT(a.first_name, ' ', a.last_name) AS author,
                        b.cover_image_url AS cover_image,
                        b.hero_image_url AS hero_image,
                        b.price
                    FROM books b
                    INNER JOIN authors a
                    ON b.author_id = a.id
                    ORDER BY b.id";

            $books = $this->db->paginate(
                sql: $query,
                page: $page,
                limitForPage: $limit
            );
        
            if (!$books) {
                Response::send(
                    [
                        'message' => 'No se han encontrado resultados.'
                    ],
                    404
                );
            }
        
            Response::send(
                [
                    'books' => $books['data'],
                    'paginate' => $books['paginate'],
                ]
            );
    
        } catch (\Throwable $th) {
            Response::error();
        }
    }
    
    function getFeaturedBooks(): void
    {   
    
        try {


            $limitCount = (int) Request::present('limit'); 
            
            $limit = '';
            if ($limitCount) {
                $limit = "LIMIT $limitCount";
            }
        

            $query = "SELECT 
                        b.id,
                        b.title,
                        b.resume,
                        CONCAT(a.first_name, ' ', a.last_name) AS author,
                        b.cover_image_url AS cover_image,
                        b.hero_image_url AS hero_image,
                        b.price
                    FROM books b
                    INNER JOIN authors a
                    ON b.author_id = a.id
                    WHERE b.featured = true
                    ORDER BY b.id
                    {$limit}";

            $books = $this->db->query($query);
        
            if (!$books) {
                Response::send(
                    [
                        'message' => 'No se han encontrado resultados.'
                    ],
                    404
                );
            }
        
            Response::send(
                [
                    'books' => $books
                ]
            );
            
        } catch (\Throwable $th) {
            var_dump($th);die;
            Response::error();
        }
    }
    
    function findBookByID(): void
    {   
    
        try {

            $query = "SELECT 
                        b.id,
                        b.title,
                        b.full_description,
                        CONCAT(a.first_name, ' ', a.last_name) AS author,
                        b.cover_image_url AS cover_image,
                        b.hero_image_url AS hero_image,
                        b.price
                    FROM books b
                    INNER JOIN authors a
                    ON b.author_id = a.id
                    WHERE b.id = :id";
        
            $book = $this->db->query(
                $query, 
                [
                    ':id' => $_POST['book_id'],
                ]
            );
        
            if (!$book) {
                Response::send(
                    [
                        'message' => 'No se han encontrado resultados.'
                    ],
                    404
                );
            }
        
            Response::send(
                [
                    'book' => $book[0]
                ]
            );
            
        } catch (\Throwable $th) {
            Response::error();
        }
    }
}
