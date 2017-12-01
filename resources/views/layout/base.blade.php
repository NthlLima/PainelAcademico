@include('layout._includes.head')

	<div class="wrapper-painel">
		<div class="sidebar">
			<div class="topbar">
				<div class="item">
					<div class="item-icon"><img src="img/logo_white.png"></div>
					<div class="item-text"><span>Painel Acadêmico</span></div>
				</div>
			</div>
			<br>
			<ul>
				<li 
				@if(Route::currentRouteName() == 'painel')
           			class="active"
         		@else
            	
         		@endif
				>
					<a href=" {{ route('painel') }}">
						<div class="item">
							<div class="item-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
							<div class="item-text"><span>Home</span></div>
						</div>
					</a>
				</li>
         		<li
         		@if(Route::currentRouteName() == 'painel.usuarios')
           			class="active"
         		@else
            	
         		@endif
         		>
         			<a href="{{ route('painel.usuarios') }}">
         				<div class="item">
							<div class="item-icon"><i class="fa fa-group" aria-hidden="true"></i></div>
							<div class="item-text"><span>Usuários</span></div>
						</div>
         			</a>
         		</li>
         		<li
         		@if(Route::currentRouteName() == 'painel.departamentos')
           			class="active"
         		@else
            	
         		@endif
         		>
         			<a href="{{ route('painel.departamentos') }}">
         				<div class="item">
							<div class="item-icon"><i class="fa fa-suitcase" aria-hidden="true"></i></div>
							<div class="item-text"><span>Departamentos</span></div>
						</div>
         			</a>
         		</li>
         		<li
         		@if(Route::currentRouteName() == 'painel.professor')
           			class="active"
         		@else
            	
         		@endif
         		>
         			<a href="{{ route('painel.professor') }}">
         				<div class="item">
							<div class="item-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
							<div class="item-text"><span>Professores</span></div>
						</div>
         			</a>
         		</li>
         		<li
         		@if(Route::currentRouteName() == 'painel.cursos')
           			class="active"
         		@else
            	
         		@endif
         		>
         			<a href="{{ route('painel.cursos') }}">
         				<div class="item">
							<div class="item-icon"><i class="fa fa-university" aria-hidden="true"></i></div>
							<div class="item-text"><span>Cursos</span></div>
						</div>
         			</a>
         		</li>
                <li
                @if(Route::currentRouteName() == 'painel.alunos')
                    class="active"
                @else
                
                @endif
                >
                    <a href="{{ route('painel.alunos') }}">
                        <div class="item">
                            <div class="item-icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
                            <div class="item-text"><span>Alunos</span></div>
                        </div>
                    </a>
                </li>
         		<li
                @if(Route::currentRouteName() == 'painel.disciplinas')
                    class="active"
                @else
                
                @endif
                >
                    <a href="{{ route('painel.disciplinas') }}">
                        <div class="item">
                            <div class="item-icon"><i class="fa fa-tags" aria-hidden="true"></i></div>
                            <div class="item-text"><span>Disciplinas</span></div>
                        </div>
                    </a>
                </li>
                <li
                @if(Route::currentRouteName() == 'painel.grade')
                    class="active"
                @else
                
                @endif
                >
                    <a href="{{ route('painel.grade') }}">
                        <div class="item">
                            <div class="item-icon"><i class="fa fa-th" aria-hidden="true"></i></div>
                            <div class="item-text"><span>Grade</span></div>
                        </div>
                    </a>
                </li>
                <li
                @if(Route::currentRouteName() == 'painel.turmas')
                    class="active"
                @else
                
                @endif
                >
                    <a href="{{ route('painel.turmas') }}">
                        <div class="item">
                            <div class="item-icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <div class="item-text"><span>Turmas</span></div>
                        </div>
                    </a>
                </li>
                <li
         		@if(Route::currentRouteName() == 'painel.matricular')
           			class="active"
         		@else
            	
         		@endif
         		>
         			<a href="{{ route('painel.matricular') }}">
         				<div class="item">
							<div class="item-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
							<div class="item-text"><span>Matricular Alunos</span></div>
						</div>
         			</a>
         		</li>
			</ul>
			
		</div>
		<div class="main">
			<div class="navbar">
				<div class="navbar-left">
					<button class="navicon"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<div class="navbar-right">
					<div class="item-user">{{ Session::get('user') }} </div>
					<a href="{{ route('logout') }}"><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></a>
				</div>
			</div>
			@yield('conteudo')
		</div>
	</div>


@include('layout._includes.footer')

