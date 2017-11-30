<?php


Route::get('/login',['as'=>'login','uses'=>'LoginCtrl@index']);
Route::get('/logout',['as'=>'logout','uses'=>'LoginCtrl@logout']);

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
*/

Route::post('/api/login',['as'=>'api.login','uses'=>'LoginCtrl@entrar']);
// USUARIOS
Route::post('/api/usuarios/admin',['as'=>'api.usuarios.admin','uses'=>'LoginCtrl@admin']);
Route::post('/api/usuarios/cord', ['as'=>'api.usuarios.cord', 'uses'=>'LoginCtrl@cord']);
Route::post('/api/usuarios/secr', ['as'=>'api.usuarios.secr', 'uses'=>'LoginCtrl@secr']);
Route::get('/api/usuarios/listar',['as'=>'api.usuarios.listar', 'uses'=>'LoginCtrl@listar']);
// DEPARTAMENTO
Route::post('/api/departamento/register',['as'=>'api.departamento.register', 'uses'=>'DepartamentosCtrl@register']);
Route::get('/api/departamento/listar',['as'=>'api.departamento.listar', 'uses'=>'DepartamentosCtrl@listar']);
Route::get('/api/departamento/sem_area_atuacao',['as'=>'api.departamento.sem_area_atuacao', 'uses'=>'DepartamentosCtrl@sem_area_atuacao']);
// AREA
Route::post('/api/area_atuacao/register',['as'=>'api.area_atuacao.adicionar_area', 'uses'=>'AreaAtuacaoCtrl@register']);
Route::get('/api/area_atuacao/listar',['as'=>'api.area_atuacao.adicionar_area', 'uses'=>'AreaAtuacaoCtrl@listar']);
//PROFESSOR
Route::post('/api/professor/register',['as'=>'api.professor.register', 'uses'=>'ProfessorCtrl@register']);
Route::post('/api/professor/inserir',['as'=>'api.professor.inserir', 'uses'=>'ProfessorCtrl@inserir']);
Route::get('/api/professor/listar',['as'=>'api.professor.register', 'uses'=>'ProfessorCtrl@listar']);
Route::post('/api/professor/info',['as'=>'api.professor.info', 'uses'=>'ProfessorCtrl@listarinfo']);
Route::post('/api/professor/possivel_coordenador',['as'=>'api.professor.possivel_coordenador', 'uses'=>'ProfessorCtrl@possivel_coordenador']);
Route::post('/api/professor/by_departamento',['as'=>'api.professor.by_departamento', 'uses'=>'ProfessorCtrl@by_departamento']);
// PESSOAS
Route::get('/api/pessoa/nao_professor',['as'=>'api.pessoa.nao_professor', 'uses'=>'PessoaCtrl@listar_nao_professor']);
// CURSO
Route::post('/api/curso/register',['as'=>'api.curso.register', 'uses'=>'CursoCtrl@register']);
Route::get('/api/curso/listar',['as'=>'api.curso.listar', 'uses'=>'CursoCtrl@listar']);
Route::get('/api/curso/all',['as'=>'api.curso.all', 'uses'=>'CursoCtrl@all']);
Route::post('/api/curso/by_departamento',['as'=>'api.curso.by_departamento', 'uses'=>'CursoCtrl@by_departamento']);
// ALUNOS
Route::post('/api/alunos/matricular',['as'=>'api.alunos.matricular', 'uses'=>'AlunoCtrl@matricular']);
Route::get('/api/alunos/all',['as'=>'api.alunos.all', 'uses'=>'AlunoCtrl@all']);
Route::get('/api/alunos/list',['as'=>'api.alunos.list', 'uses'=>'AlunoCtrl@list']);
// DISCIPLINAS
Route::post('/api/disciplinas/adicionar',['as'=>'api.disciplinas.adicionar', 'uses'=>'DisciplinaCtrl@adicionar']);
Route::get('/api/disciplinas/listar',['as'=>'api.disciplinas.listar', 'uses'=>'DisciplinaCtrl@listar']);
Route::get('/api/disciplinas/all',['as'=>'api.disciplinas.all', 'uses'=>'DisciplinaCtrl@all']);
Route::post('/api/disciplinas/out_disciplina',['as'=>'api.disciplinas.out_disciplina', 'uses'=>'DisciplinaCtrl@out_disciplina']);
Route::post('/api/disciplinas/adicionar_pre',['as'=>'api.disciplinas.adicionar_pre', 'uses'=>'DisciplinaCtrl@adicionar_pre']);
Route::post('/api/disciplinas/adicionar_grade',['as'=>'api.disciplinas.adicionar_grade', 'uses'=>'DisciplinaCtrl@adicionar_grade']);
Route::post('/api/disciplinas/get_cursos',['as'=>'api.disciplinas.get_cursos', 'uses'=>'DisciplinaCtrl@get_cursos']);
// GRADE
Route::post('/api/grade/buscar',['as'=>'api.grade.buscar', 'uses'=>'GradeCtrl@buscar']);
	

/*
|--------------------------------------------------------------------------
| PAINEL
|--------------------------------------------------------------------------
*/


Route::group(['middleware'=>'auth'], function(){

  Route::get('/',['as'=>'painel','uses'=>'PainelCtrl@index']);
  Route::get('/usuarios',['as'=>'painel.usuarios','uses'=>'UsuariosCtrl@index']);
  Route::get('/departamentos', ['as'=>'painel.departamentos','uses'=>'DepartamentosCtrl@index']);
  Route::get('/professor', ['as'=>'painel.professor','uses'=>'ProfessorCtrl@index']);
  Route::get('/professor/adicionar', ['as'=>'painel.professor.adicionar','uses'=>'ProfessorCtrl@adicionar']);
  Route::get('/professor/cadastrar', ['as'=>'painel.professor.cadastrar','uses'=>'ProfessorCtrl@cadastrar']);
  Route::get('/professor/info', ['as'=>'painel.professor.info','uses'=>'ProfessorCtrl@info']); # info_professor
  Route::get('/cursos', ['as'=>'painel.cursos','uses'=>'CursoCtrl@index']); 
  Route::get('/cursos/adicionar', ['as'=>'painel.cursos.adicionar','uses'=>'CursoCtrl@indexAdicionar']); 
  Route::get('/alunos', ['as'=>'painel.alunos','uses'=>'AlunoCtrl@index']); 
  Route::get('/alunos/matricula', ['as'=>'painel.alunos.matricula','uses'=>'AlunoCtrl@indexMatricula']); 
  Route::get('/alunos/rematricula', ['as'=>'painel.alunos.rematricula','uses'=>'AlunoCtrl@indexRematricula']); 
  Route::get('/disciplinas', ['as'=>'painel.disciplinas','uses'=>'DisciplinaCtrl@index']); 
  Route::get('/disciplinas/adicionar', ['as'=>'painel.disciplinas.adicionar','uses'=>'DisciplinaCtrl@indexAdicionar']); 
  Route::get('/disciplinas/pre_requisito', ['as'=>'painel.disciplinas.pre_requisito','uses'=>'DisciplinaCtrl@indexPR']); 
  Route::get('/disciplinas/adicionar/grade', ['as'=>'painel.disciplinas.adicionar.grade','uses'=>'DisciplinaCtrl@indexAddGrade']); 
  Route::get('/grade', ['as'=>'painel.grade','uses'=>'GradeCtrl@index']); 

});



// Route::group(['prefix' => 'api'], function()
// {
// 	Route::get('pessoas', 'PessoaController@lista');
// 	Route::post('pessoas', 'PessoaController@novo');
// 	Route::put('pessoa/{id}', 'PessoaController@editar');
// 	Route::delete('pessoa/{id}', 'PessoaController@excluir');
// });