<?php

use App\Models\Produto;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\TabelaExercicio;
use App\Models\Professor;
use App\Models\Aluno;

// Routes


$app->get('/teste', function($request, $response){
    echo 'dfopd';
    
    
 });


 $app->group('/api/v1', function(){

    //-----------Área de treinos------------
     //Listar Treinos por Id
     $this->get('/exercicios/listar/{id}', function($request, $response, $args){
        $exercicios = TabelaExercicio::get()->where('id', '=', $args['id']);
        return $response->withJson($exercicios);
        
        
     });

     //Adicionar Treino
    $this->post('/exercicios/adicionar', function($request, $response){
        
        $dados = $request->getParsedBody();
        $exercicios = TabelaExercicio::create($dados);
        return $response->withJson($exercicios);
    });


     //-----------Área do Professor------------

     //Listar Professor
     $this->get('/professores/listar/{id}', function($request, $response, $args){
         
         try{
             $professores = Professor::findOrFail($args['id']);
             return $response->withJson($professores);
        }catch(Exception $e){
            echo 'ID do professor incorreto';
        }

     });



    //Adicionar Aluno
    $this->post('/professores/adicionar', function($request, $response){
        
        $dados = $request->getParsedBody();
        $professores = Professor::create($dados);
        return $response->withJson($professores);
    });
     

    //Atualizar Professor por Id
    $this->put('/professores/atualizar/{id}', function($request, $response, $args){

        $dados = $request->getParsedBody();

        $professores = Professor::findOrFail($args['id']);
        $professores->update($dados);
        return $response->withJson($professores);
    });




     //-----------Área do aluno------------

     //Listar Aluno
     $this->get('/alunos/listar', function($request, $response, $args){
        $alunos = Aluno::get();
        //$alunos = Aluno::findOrFail($args['id']);
        return $response->withJson($alunos);
     });

     //Adicionar Aluno
    $this->post('/alunos/adicionar', function($request, $response){
        
        $dados = $request->getParsedBody();
        
        $alunos = Aluno::create($dados);
        return $response->withJson($alunos);
    });

    //Atualizar Aluno por Id
    $this->put('/alunos/atualizar/{id}', function($request, $response, $args){
    
        $dados = $request->getParsedBody();

        $alunos = Aluno::findOrFail($args['id']);
        $alunos->update($dados);
        return $response->withJson($alunos);
    });




    $this->post('/login', function($request, $response, $args){
        
        
        $host = 'localhost';
        $dbname = 'login_teste';
        $user = 'root';
        $pass = '';

        $mysqli = new mysqli($host, $user, $pass, $dbname);
        
        if($mysqli->error){
            die("falha");
        }

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "select * from alunos where email='$email' and senha='$senha'";
        $sql_query = $mysqli->query($sql_code) or die ("falha");

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            echo 'foi ';
        }

        
    });

});