<?php

 namespace Usuario\Form;

 use Zend\Form\Form;

 class UsuarioForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('usuario');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'cve_usuario',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Clave Usuario',
             ),
         ));
         $this->add(array(
             'name' => 'nombre',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Nombre',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }