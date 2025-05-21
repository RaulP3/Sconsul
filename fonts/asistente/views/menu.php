<ul class="side-menu">

<!-- Home -->
	<li class="slide <?php if ($pagina == 'inicio') echo 'is-expanded'; ?>">
		<a class="side-menu__item <?php if ($pagina == 'inicio') echo 'active'; ?>" 
		href="index.php?page=inicio"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Home</span></a>
	</li>

	<br><br><h3>Catalogos</h3>

<!-- Pacientes -->
	<li class="slide <?php if ($pagina == 'vPacienteAdd' || $pagina == 'vPacienteList' ) echo 'is-expanded'; ?>">
		<a class="side-menu__item 
			<?php if ($pagina == 'vPacienteAdd' || $pagina == 'vPacienteList' ) 
					echo 'active'; ?>" data-toggle="slide" href="#">
					<i class="side-menu__icon icon icon-people"></i>
					<span class="side-menu__label">Pacientes</span>
					<i class="angle fa fa-angle-right"></i>
		</a>
		<ul class="slide-menu">
			<li><a class="slide-item 
				<?php if ($pagina == 'vPacienteAdd') 
						echo 'active'; ?>" href="index.php?page=vPacienteAdd">Agregar</a>
			</li>
			<li><a class="slide-item 
				<?php if ($pagina == 'vPacienteList') 
						echo 'active'; ?>" href="index.php?page=vPacienteList">Lista</a>
			</li>

		</ul>
	</li>

<!-- Accesos -->
	<li class="slide <?php if ($pagina == 'vUserAdd' || $pagina == 'vUserList' ) echo 'is-expanded'; ?>">
		<a class="side-menu__item 
			<?php if ($pagina == 'vUserAdd' || $pagina == 'vMedicoList' ) 
					echo 'active'; ?>" data-toggle="slide" href="#">
					<i class="side-menu__icon icon icon-people"></i>
					<span class="side-menu__label">Accesos</span>
					<i class="angle fa fa-angle-right"></i>
		</a>
		<ul class="slide-menu">
			<li><a class="slide-item 
				<?php if ($pagina == 'vUserAdd') 
						echo 'active'; ?>" href="index.php?page=vUserAdd">Agregar</a>
			</li>
			<li><a class="slide-item 
				<?php if ($pagina == 'vUserList') 
						echo 'active'; ?>" href="index.php?page=vUserList">Lista</a>
			</li>

		</ul>
	</li>

</ul>