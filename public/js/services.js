app.factory('usuarioService',function($http) {

	return {
		login: function(data){
			return $http.post('/api/login', data);
		},
		register_admin: function(data){
			return $http.post('/api/usuarios/admin', data);
		},
		register_cord: function(data){
			return $http.post('/api/usuarios/cord', data);
		},
		register_secr: function(data){
			return $http.post('/api/usuarios/secr', data);
		},
		listar: function(){
			return $http.get('/api/usuarios/listar');
		}//,
		// update: function(data){
		// 	var id = data.id;
		// 	delete data.id;
		// 	return $http.put('/api/pessoa/'+id, data);
		// },
		// logout: function(){
		// 	return $http.get('/api/pessoa/');
		// }
	}

});

app.factory('pessoaService',function($http) {

	return {
		nao_professor: function(){
			return $http.get('/api/pessoa/nao_professor');
		}
	}

});
app.factory('depService',function($http) {

	return {
		register: function(data){
			return $http.post('/api/departamento/register', data);
		},
		adicionar_area: function(data){
			return $http.post('/api/departamento/adicionar_area', data);
		},
		listar: function(){
			return $http.get('/api/departamento/listar');
		},
		sem_area_atuacao: function(){
			return $http.get('/api/departamento/sem_area_atuacao');
		}
	}

});

app.factory('areaService',function($http) {

	return {
		register: function(data){
			return $http.post('/api/area_atuacao/register', data);
		},
		listar: function(){
			return $http.get('/api/area_atuacao/listar');
		}
	}
});

app.factory('profService',function($http) {

	return {
		register: function(data){
			return $http.post('/api/professor/register', data);
		},
		inserir: function(data){
			return $http.post('/api/professor/inserir', data);
		},
		listar: function(){
			return $http.get('/api/professor/listar');
		},
		info: function(id){
			return $http.post('/api/professor/info', id);
		},
		possivel_coordenador: function(data){
			return $http.post('/api/professor/possivel_coordenador', data);
		},
		by_departamento: function(data){
			return $http.post('/api/professor/by_departamento', data);
		}
	}

});

app.factory('cursosService',function($http) {

	return {
		register: function(data){
			return $http.post('/api/curso/register', data);
		},
		listar: function(){
			return $http.get('/api/curso/listar');
		},
		all: function(){
			return $http.get('/api/curso/all');
		},
		by_departamento: function(data){
			return $http.post('/api/curso/by_departamento', data);
		}
	}

});

app.factory('alunoService',function($http) {

	return {
		matricular: function(data){
			return $http.post('/api/alunos/matricular', data);
		},
		all: function(){
			return $http.get('/api/alunos/all');
		},
		list: function(){
			return $http.get('/api/alunos/list');
		}
	}

});

app.factory('discService',function($http) {

	return {
		adicionar: function(data){
			return $http.post('/api/disciplinas/adicionar', data);
		},
		listar: function(){
			return $http.get('/api/disciplinas/listar');
		},
		all: function(){
			return $http.get('/api/disciplinas/all');
		},
		out_disciplina: function(data){
			return $http.post('/api/disciplinas/out_disciplina', data);
		},
		adicionar_pre: function(data){
			return $http.post('/api/disciplinas/adicionar_pre', data);
		},
		adicionar_grade: function(data){
			return $http.post('/api/disciplinas/adicionar_grade', data);
		},
		get_cursos: function(data){
			return $http.post('/api/disciplinas/get_cursos', data);
		}
	}

});

app.factory('gradeService',function($http) {

	return {
		buscar: function(data){
			return $http.post('/api/grade/buscar', data);
		}
	}

});

app.factory('turmaService',function($http) {

	return {
		adicionar: function(data){
			return $http.post('/api/turmas/adicionar', data);
		}
	}

});