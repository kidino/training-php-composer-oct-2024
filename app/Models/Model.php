<?php 

namespace App\Models;

class Model {

    public $table;
    public $id;
    public $db_conn;
    public $query_builder;

    function __construct() {
        global $db_conn;
        $this->db_conn = $db_conn;
        $this->query_builder = $this->db_conn->createQueryBuilder();      
    }

    public function get_by_id( $id = 0 ) {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table )
            ->where( $this->id .' = ?')
            ->setParameter(0, $id );

        return $stmt->executeQuery()->fetchAssociative();
    }

    public function get_all() {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table );

        return $stmt->executeQuery()->fetchAllAssociative();
    }

    public function save( $data = []) {
        try {
            $id = null;

            // to update
            if(isset($data[ $this->id ])) {
                $id = $data[ $this->id ];
                $this->db_conn->update( $this->table, $data, [ $this->id => $id ] );
            } else { // to insert new
                $this->db_conn->insert( $this->table, $data );
                $id = $this->db_conn->lastInsertId();
            }

            return $this->db_conn->fetchAllAssociative("
                SELECT * FROM {$this->table} WHERE {$this->id} = ?", 
                [ $id ]);
        } catch(\Exception $e) {
            return false;
        }
    }

}