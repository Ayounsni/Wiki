<?php
  class Users extends Controller {

    public function __construct(){
       
    }

    public function index(){
      
      
        $this->view('users/index');
      }

      public function login(){
      
      
        $this->view('users/login');
      }
    }
    