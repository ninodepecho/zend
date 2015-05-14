<?php
namespace Usuario\Model;

 use Zend\Db\TableGateway\TableGateway;

 class UsuarioTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getUsuario($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveUsuario(Usuario $usuario)
     {
         $data = array(
             'cve_usuario' => $usuario->cve_usuario,
             'nombre'  => $usuario->nombre,
         );

         $id = (int) $usuario->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getUsuario($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Usuario id does not exist');
             }
         }
     }

     public function deleteUsuario($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }