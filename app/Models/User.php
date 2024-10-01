<?php
namespace App\Models;

class User extends Model {
    var $table = 'users';
    var $id = 'id';

    public function get_by_username($username, $id = null) {
        $stmt = $this->query_builder
            ->select('*')->from($this->table)
            ->where('username like ?')->setParameter(0, $username);

        if($id != null) {
            $this->query_builder->andWhere( $this->id . ' != ?')
                ->setParameter(1, $id);
        }

        return $stmt->executeQuery()->fetchAssociative();
    }

    public function get_by_email($email, $id = null) {
        $stmt = $this->query_builder
            ->select('*')->from($this->table)
            ->where('email like ?')->setParameter(0, $email);

        if($id != null) {
            $this->query_builder->andWhere( $this->id . ' != ?')
                ->setParameter(1, $id);
        }

        return $stmt->executeQuery()->fetchAssociative();
    }

}
