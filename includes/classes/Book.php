<?php

namespace Includes\Classes;

use Exception;
use Includes\Dtos\StoreFileDTO;
use Includes\Repositories\BookRepository;

class Book {

    private BookRepository $repository;
    private DB $db;

    public function __construct() {
        $this->db = new DB;
        $this->repository = new BookRepository($this->db);
    }

    public function create(): void
    {
        try {

            $coverImage = Request::presentFile('book_cover_image');

            $coverImageName = uniqid('imagen_') . '_' . basename($coverImage['name']);

            $coverImagedSaved = Storage::store(
                new StoreFileDTO(
                    BASE_URL . "images/",
                    $coverImageName,
                    $coverImage['tmp_name']
                )
            );

            if (!$coverImagedSaved){
                $error = error_get_last();
                throw new Exception("Error Saving Image: " .  $error['message']);
            }

            $heroImage = Request::presentFile('book_hero_image');

            $heroImageName = uniqid('imagen_') . '_' . basename($heroImage['name']);

            $heroImagedSaved = Storage::store(
                new StoreFileDTO(
                    fileName: $heroImage['name'],
                    file: $heroImage['tmp_name']
                )
            );

            if (!$heroImagedSaved){
                throw new Exception("Error Saving Image");
            }

            $title = Request::present('book_title');
            $resume = Request::present('book_resume');
            $description = Request::present('book_description');
            $price = Request::present('book_price');

            $query = "INSERT INTO books SET
                        title = :title ,
                        resume = :resume ,
                        full_description = :description ,
                        price = :price, 
                        author = 1,
                        cover_image_url = :cover_image_url ,
                        hero_image_url= :hero_image_url ";
            
            $queryExecuted = $this->db->execute(
                    $query, 
                    [
                        ':title' => $title,
                        ':resume' => $resume,
                        ':description' => $description,
                        ':price' => $price,
                        ':cover_image_url' => $coverImageName,
                        ':hero_image_url' => $heroImageName
                    ]
            );

            if ($queryExecuted) {
                Response::send([
                    'message' => 'Libro guardado correctamente.'
                ]);
            }

            Response::send([
                'message' => 'Ocurrió un error, intenta nuevamente más tarde.'
            ], 500);

        } catch (Exception $e) {
            echo $e->getMessage();die;
            Response::error();
        }       
    }

    public function edit() : void 
    {
        try {

            $id = Request::present('book_id');
            $title = Request::present('title');
            $resume = Request::present('resume');
            $description = Request::present('description');
            $price = Request::present('price');

            $query = "UPDATE books SET
                        title = :title ,
                        resume = :resume ,
                        full_description = :description ,
                        price = :price
                    WHERE id = :id ";
            
            $queryExecuted = $this->db->execute(
                    $query, 
                    [
                        ':id' => $id,
                        ':title' => $title,
                        ':resume' => $resume,
                        ':description' => $description,
                        ':price' => $price
                    ]
            );

            if ($queryExecuted) {
                Response::send([
                    'message' => 'Cambios guardados correctamente'
                ]);
            }

            Response::send([
                'message' => 'Ocurrió un error, intenta nuevamente más tarde'
            ], 500);

        } catch (Exception $e) {
            Response::error();
        }
    }

    function getAllBooks(): void
    {   
        try {

            $page = Request::present('page') ?: 1;
            $limit = Request::present('limit') ?: 10;

            $books = $this->repository->getAllBooks($page, $limit);
        
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
