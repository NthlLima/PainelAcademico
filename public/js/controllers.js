app.controller('ctrlLogin', function($scope, $http, $timeout, ngToast, usuarioService){


    $scope.fazerlogin = function(){

      usuarioService.login($scope.usuario).then(function(response){

        if (response.data == "true") {
            location.assign("/");
        }
        else{
          var toastFalse = ngToast.danger({
            content: response.data,
            dismissOnTimeout:false,
            dismissButton:true
          });

        }


      });

    };
    
});

app.controller('ctrlUsuarios', function($scope, $http, $timeout, ngToast, usuarioService){

  $scope.type = -1;

  $scope.openModal  = function (){
    $scope.modal    = { "display" : "block"};
    $scope.modaladd = { "display" : "block"};
  };

  $scope.closeModal  = function (){
    $scope.modal    = { "display" : "none"};
    $scope.modaladd = { "display" : "none"};
  };


  $scope.addAdmin = function (){
    $scope.openModal();
    $scope.type = 2;
  };

  $scope.addCord  = function (){
      $scope.openModal();
      $scope.type = 3;
  }; 

  $scope.addSecr  = function (){
    $scope.openModal();
    $scope.type = 4;
  };


  $scope.toast = function (result, message){
    console.log(message);
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

      $scope.closeModal();
      $scope.user.username = "";
      $scope.user.password = "";
      $scope.user.passrep = "";

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });

    }

  };


  $scope.addUser = function (){


    if ($scope.type == 2){
      usuarioService.register_admin($scope.user).then(function(response){
        $scope.toast(response.data.result, response.data.message);
      });

    } else if ($scope.type == 3){
      usuarioService.register_cord($scope.user).then(function(response){
        $scope.toast(response.data.result, response.data.message);
      });

    } else if ($scope.type == 4){
      usuarioService.register_secr($scope.user).then(function(response){
        $scope.toast(response.data.result, response.data.message);
      });

    }

   };

    usuarioService.listar().then(function(response){
        $scope.usuarios = response.data;
    });


});


app.controller('ctrlDep', function($location, $scope, $http, ngToast, depService, areaService)
{
   $scope.init = function(){

    depService.listar().then(function(response){
        $scope.departamentos = response.data;
    });

   depService.sem_area_atuacao().then(function(response){
        $scope.dep_atuacao = response.data;
    });

   }

   $scope.openModal  = function (){
      $scope.modal    = { "display" : "block"};
      $scope.modaladd = { "display" : "block"};
   };
   $scope.openArea  = function (){
      $scope.modal    = { "display" : "block"};
      $scope.modalarea = { "display" : "block"};
   };

   $scope.closeModal  = function (){
      $scope.modal    = { "display" : "none"};
      $scope.modaladd = { "display" : "none"};
   };
   $scope.closeArea  = function (){
      $scope.modal    = { "display" : "none"};
      $scope.modalarea = { "display" : "none"};
   };

   $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

      $scope.closeModal();

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };


   $scope.addDep  = function (){

    depService.register($scope.dep).then(function(response){
        $scope.toast(response.data.result, response.data.message);
        $scope.dep.nome = "";
    });
      $scope.init();
   };

   $scope.addArea  = function (){
    areaService.register($scope.area).then(function(response){
        $scope.toast(response.data.result, response.data.message);
        $scope.area.nome = '';
    });

    $scope.init();
   };


});

app.controller('ctrlProf', function($location, $timeout, $scope, $http, ngToast, depService, profService, pessoaService)
{

  $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };


  $scope.infoProf = function(prof){
    location.assign("/professor/info/");
    sessionStorage.setItem('info_professor', prof);
  };

  $scope.initAdd = function(){
      depService.listar().then(function(response){
          $scope.departamentos = response.data;
      }); 
  };

  $scope.init = function(){
      profService.listar().then(function(response){
          $scope.professores = response.data;
      });
  };

  $scope.initCad = function(){

      pessoaService.nao_professor().then(function(response){
            $scope.pessoas = response.data;
      });

      depService.listar().then(function(response){
            $scope.departamentos = response.data;
      });
  };

  $scope.initInfo = function(){
    var id = sessionStorage.getItem('info_professor');

    profService.info(id).then(function(response){
          $scope.professor = response.data[0];
      });
  }

  $scope.newProfessor = function(){
    profService.register($scope.prof).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/professor");
            }, 1000);
        }
    });
  };

  $scope.cadProfessor = function(){
    profService.inserir($scope.prof).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/professor");
            }, 1000);
        }
    });
  };

});

app.controller('ctrlCurso', function($location, $timeout, $scope, $http, ngToast, areaService, profService, cursosService)
{

  $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };

  $scope.getProfs = function(){
    profService.possivel_coordenador($scope.curso.area_fk).then(function(response){
      $scope.profs = response.data;
    });
  };


  $scope.init = function(){

    cursosService.listar().then(function(response){
        $scope.cursos = response.data;
    });

  };
  $scope.initAdd = function(){

    areaService.listar().then(function(response){
        $scope.areas = response.data;
    });

  };

  $scope.addCurso = function (){

    cursosService.register($scope.curso).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/cursos");
            }, 1000);
        }
    });

  };



});
app.controller('ctrlAluno', function($location, $timeout, $scope, $http, ngToast,  alunoService, cursosService)
{

  $scope.transf = false;

  $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };


  $scope.initMat = function(){

    cursosService.all().then(function(response){
        $scope.cursos = response.data;
    });

  };

  $scope.initReMat = function(){

    cursosService.all().then(function(response){
        $scope.cursos = response.data;
    });

    alunoService.all().then(function(response){
        $scope.alunos = response.data;
    });

  };

  $scope.alunoAdm = function(){

    if ($scope.aluno.admissao == 1 || $scope.mat.admissao == 1) {
      $scope.transf = false;
    }
    else if ($scope.aluno.admissao == 2 || $scope.mat.admissao == 2) {
      $scope.transf = true;
    }

  }

  $scope.addAluno = function (){

    alunoService.matricular($scope.aluno).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/alunos");
            }, 1000);
        }
    });

  };



});


app.controller('ctrlDisciplina', function($location, $timeout, $scope, $http, ngToast,  profService, discService, depService, cursosService)
{


  $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };


  $scope.init = function(){
    discService.listar().then(function(response){
      $scope.disciplinas = response.data;
    });
  };


  $scope.initAdd = function(){
    depService.listar().then(function(response){
            $scope.deps = response.data;
      });
  };


  $scope.initPre = function(){
    discService.all().then(function(response){
      $scope.disciplinas = response.data;
    });
  };
  
  $scope.initGrade = function(){
    discService.all().then(function(response){
      $scope.disciplinas = response.data;
    });
  };


  $scope.getProfs = function(){
    profService.by_departamento($scope.disciplina.departamento).then(function(response){
      $scope.profs = response.data;
    });
  };

  $scope.getCursos = function(){
    cursosService.by_departamento($scope.disciplinas[$scope.grade.disciplina].departamento).then(function(response){
      $scope.cursos = response.data;
    });
  };


  $scope.getPreR = function(){
    discService.out_disciplina($scope.prereq.disciplina).then(function(response){
      $scope.PRdisciplinas = response.data;
    });
  };
  

  $scope.addDisc = function (){

    discService.adicionar($scope.disciplina).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/disciplinas");
            }, 1000);
        }
    });

  };  

  $scope.addDiscPre = function (){

    discService.adicionar_pre($scope.prereq).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/disciplinas");
            }, 1000);
        }
    });

  };

  $scope.addDiscGrade = function (){

    discService.adicionar_grade($scope.grade).then(function(response){
        $scope.toast(response.data.result, response.data.message);

        if (response.data.result == true) {
            setTimeout(function () {
              location.assign("/disciplinas");
            }, 1000);
        }
    });

  };



});

app.controller('ctrlGrade', function($location, $timeout, $scope, $http, ngToast, cursosService, gradeService)
{

  $scope.table = false;

  $scope.toast = function (result, message){
    if(result == true){

      var toastTrue = ngToast.success({
        content: message,
        dismissOnTimeout:false,
        dismissButton:true,
        horizontalPosition: 'center'
      });

    } else{

      var toastFalse = ngToast.danger({
          content: message,
          dismissOnTimeout:false,
          dismissButton:true,
          horizontalPosition: 'center'
      });
    }

  };


  $scope.init = function(){
    cursosService.all().then(function(response){
      $scope.cursos = response.data;
    });
  };


  $scope.buscarGrade = function(){
    gradeService.buscar($scope.search).then(function(response){
      $scope.grade = response.data;
      grade = response.data;

      if (grade.length > 0) {
        $scope.table = true;
      } else{
        $scope.table = false;
      }
    });
  }


});