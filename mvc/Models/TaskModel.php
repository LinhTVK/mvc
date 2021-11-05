<?php
namespace MVC\Models;
use MVC\Core\Model;
    /**
    * Class TaskModel
    */
    class TaskModel extends Model{
        protected $id;
        protected $title;
        protected $description;
        protected $created_at;
        protected $updated_at;
        
        /**
        * Set id
        *
        * @param int $id
        * @return BlockInterface
        */
        public function setId($id): void {
            $this->id = $id;
        }

        /**
        * Get identifier
        *
        * @return int
        */
        public function getId(): void {
            return $this->id;
        }

        /**
        * Set title
        *
        * @param string $title
        * @return BlockInterface
        */
        public function setTitle($title): void {
            $this->title = $title;
        }

        /**
        * Get identifier
        *
        * @return string
        */
        public function getTitle(): void {
            return $this->title;
        }

        /**
        * Set description
        *
        * @param string $description
        * @return BlockInterface
        */
        public function setDescription($description): void {
            $this->description = $description;
        }

        /**
        * Get identifier
        *
        * @return string
        */
        public function getDescription():void {
            return $this->description;
        }

        /**
        * Set created_at
        *
        * @param timestamps $created_at
        * @return BlockInterface
        */
        public function getCreatedAt(): void {
            return $this->created_at;
        }
        
        /**
        * Get identifier
        *
        * @return timestamps
        */
        public function setCreateAt($created_at): void {
            $this->created_at = $created_at;
        }

        /**
        * Set created_at
        *
        * @param timestamps $updated_at
        * @return BlockInterface
        */
        public function getUpdateAt(): void {
            return $this->updated_at;
        }
        
        /**
        * Get identifier
        *
        * @return timestamps
        */
        public function setUpdateAt($updated_at): void {
            $this->updated_at = $updated_at;
        }

    }
?>
