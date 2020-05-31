<?php

class Job{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get All Jobs
    public function getAllJobs(){
        $this->db->query("SELECT jobs.*, category.name AS cname 
        FROM jobs 
        INNER JOIN category 
        ON jobs.category_id = category.id 
        ORDER BY date DESC
         ");
        
        // Assign the Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get All Categories
    public function getCategories(){
        $this->db->query("
            SELECT * FROM category
        ");

        // Assign the Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get Jobs By Category
    public function getByCategory($category){
        $this->db->query("SELECT jobs.*, category.name AS cname 
        FROM jobs 
        INNER JOIN category 
        ON jobs.category_id = category.id 
        WHERE jobs.category_id = $category 
        ORDER BY date DESC
         ");

        // Assign the Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    // Get Category
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM category WHERE Id = :category_id");
        $this->db->bind(":category_id", $category_id);

        //Assign Row
        $row = $this->db->single();
        return $row;
    }

    // GEt Job
    public function getJob($id) {
        $this->db->query("SELECT * FROM jobs WHERE Id = :id"); 
        $this->db->bind(":id", $id);

        //Assign Row
        $row = $this->db->single();
        return $row;
    }

    //Create Job
    public function create($data){
        //Insert Query
        $this->db->query("
            INSERT INTO jobs (
                category_id, job_title, company, description, location, salary, contact_user, contact_email
            ) VALUES (
                :category_id, :job_title, :company, :description, :location, :salary, :contact_user, :contact_email
            )
        ");
        //Bind Data 
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}