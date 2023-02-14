<?php  
	if ($_SESSION["rol_id"]==1) {
		?>
			<nav class="side-menu">
	    <ul class="side-menu-list">
	            <span>
	                <i class="font-icon font-icon-edit"></i>
	                <span class="lbl">Forms</span>
	            </span>
	    		<ul>
	                <li><a href="ui-form.html"><span class="lbl">Basic Inputs</span></a></li>
	                <li><a href="ui-buttons.html"><span class="lbl">Buttons</span></a></li>
	                <li><a href="ui-select.html"><span class="lbl">Select &amp; Tags</span></a></li>
	                <li><a href="ui-checkboxes.html"><span class="lbl">Checkboxes &amp; Radios</span></a></li>
	                <li><a href="ui-form-validation.html"><span class="lbl">Validation</span></a></li>
	                <li><a href="typeahead.html"><span class="lbl">Typeahead</span></a></li>
	                <li><a href="steps.html"><span class="lbl">Steps</span></a></li>
	                <li><a href="ui-form-input-mask.html"><span class="lbl">Input Mask</span></a></li>
	                <li><a href="form-flex-labels.html"><span class="lbl">Flex Labels</span></a></li>
	                <li><a href="ui-form-extras.html"><span class="lbl">Extras</span></a></li>
	            </ul>
	        
	        <li class="blue-dirty">
	            <a href="..\Home\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Inicio</span>
	            </a>
	        </li>
            <li class="blue-dirty">
	            <a href="..\NuevoTicket\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Nuevo Ticket</span>
	            </a>
	        </li>
            <li class="blue-dirty">
	            <a href="..\ConsultarTicket\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Consultar ticket</span>
	            </a>
	        </li>
		</ul>
	</nav>
		<?php
	}else {
		?>
			<nav class="side-menu">
	    <ul class="side-menu-list">
	            <span>
	                <i class="font-icon font-icon-edit"></i>
	                <span class="lbl">Forms</span>
	            </span>
	    		<ul>
	                <li><a href="ui-form.html"><span class="lbl">Basic Inputs</span></a></li>
	                <li><a href="ui-buttons.html"><span class="lbl">Buttons</span></a></li>
	                <li><a href="ui-select.html"><span class="lbl">Select &amp; Tags</span></a></li>
	                <li><a href="ui-checkboxes.html"><span class="lbl">Checkboxes &amp; Radios</span></a></li>
	                <li><a href="ui-form-validation.html"><span class="lbl">Validation</span></a></li>
	                <li><a href="typeahead.html"><span class="lbl">Typeahead</span></a></li>
	                <li><a href="steps.html"><span class="lbl">Steps</span></a></li>
	                <li><a href="ui-form-input-mask.html"><span class="lbl">Input Mask</span></a></li>
	                <li><a href="form-flex-labels.html"><span class="lbl">Flex Labels</span></a></li>
	                <li><a href="ui-form-extras.html"><span class="lbl">Extras</span></a></li>
	            </ul>
	        
	        <li class="blue-dirty">
	            <a href="..\Home\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Inicio</span>
	            </a>
	        </li>
            <!-- <li class="blue-dirty">
	            <a href="..\NuevoTicket\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Nuevo Ticket</span>
	            </a>
	        </li> -->
            <li class="blue-dirty">
	            <a href="..\MntUsuario\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Mantenimiento Usuario</span>
	            </a>
	        </li>
			<li class="blue-dirty">
	            <a href="..\ConsultarTicket\">
	                <span class="glyphicon glyphicon-th"></span>
	                <span class="lbl">Consultar ticket</span>
	            </a>
	        </li>
		</ul>
	</nav>
		<?php
	}
?>

	