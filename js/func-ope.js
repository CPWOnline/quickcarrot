function mov(){
	$('#sgac div.espera').css('right', '-50%');
}
$(document).ready(function(){
	$('#sgac div.espera').css('right', '.5cm');
	$('#sgac div.espera').html("Preferiblemente, visualice esta secci&oacute;n desde un PC de escritorio.");
	var retrasar = setTimeout(mov, 3000);
	//Iniciar sesión//
		//General
			$('#sgac button#iniciar_sesion').click(function(e){
				e.preventDefault();
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var u_nombre = $('#sgac input[name="u_nombre"]').val();
					var u_clave = $('#sgac input[name="u_clave"]').val();
					var contador = $('#sgac input[name="contador"]').val();
					$('#sgac input[name="contador"]').val(contador*1+1);
				//Llamada AJAX
					$.post("enlaces/iniciar_sesion.php", {u_nombre:u_nombre, u_clave:u_clave, contador:contador},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Actualizar
		//General
			$('#sgac i.img_col.actualizar').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					$.post("enlaces/actualizar.php", {tipo:tipo},function(r){
						$("#sgac div.tabla_gen."+tipo).html(r)
						$('#sgac div.espera').html("Listo.");
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Guardar------------------------------------------------------------------------------
		//Menus-------------------------------------------------
			$('#sgac #guarda_menu').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var m_titulo = $('#sgac input[name="m_titulo"]').val();
					var m_posicion = $('#sgac select[name="m_posicion"]').val();
					var tipo = "menus";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {m_titulo:m_titulo, m_posicion:m_posicion, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Submenus--------------------------------------------------
			$('#sgac #guarda_sub').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var s_titulo = $('#sgac input[name="s_titulo"]').val();
					var s_posicion = $('#sgac select[name="s_posicion"]').val();
					var s_menu = $('#sgac select[name="s_menu"]').val();
					var tipo = "sub";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {s_titulo:s_titulo, s_posicion:s_posicion, s_menu:s_menu, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Artículos--------------------------------------------------
			$('#sgac #guarda_art').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var a_titulo = $('#sgac input[name="a_titulo"]').val();
					var a_contenido = $('#sgac textarea[name="a_contenido"]').val();
					var tipo = "articulo";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {a_titulo:a_titulo, a_contenido:a_contenido, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Informaciones--------------------------------------------------
			$('#sgac #guarda_inf').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var i_menu = $('#sgac select[name="inf_menu"]').val();
					var i_sub = $('#sgac select[name="inf_sub"]').val();
					var i_titulo = $('#sgac input[name="inf_tit"]').val();
					var i_titulo_letra = $('#sgac input[name="inf_tit_letra"]').val();
					var i_contenido = $('#sgac textarea[name="inf_cont"]').val();
					var i_contenido_fondo = $('#sgac input[name="inf_cont_fondo"]').val();
					var i_contenido_borde = $('#sgac input[name="inf_cont_borde"]').val();
					var i_contenido_letra = $('#sgac input[name="inf_cont_letra"]').val();
					var i_posicion = $('#sgac select[name="inf_pos"]').val();
					var i_disegno = $('#sgac select[name="inf_disegno"]').val();
					var tipo = "informacion";
				//Llamada AJAX
					$.post("enlaces/guardar.php", {i_menu:i_menu, i_sub:i_sub, i_titulo:i_titulo, i_titulo_letra:i_titulo_letra, i_contenido:i_contenido, i_contenido_fondo:i_contenido_fondo, i_contenido_borde:i_contenido_borde, i_contenido_letra:i_contenido_letra, i_posicion:i_posicion, i_disegno:i_disegno, tipo:tipo},function(r){
						$('#sgac div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Borrar------------------------------------------------------------------------------
		//Menus-------------------------------------------------
			$('#sgac i.borrar_menu').click(function(e){
				//Animación
					$('#sgac div.espera').css('right', '.5cm');
					$('#sgac div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var m_m = $(this).attr("tag");
					var tipo = "menus";
				//Confirmación
					$("#sgac #conf_borrar_menu").css("display", "block");
					$("#sgac #conf_borrar_menu a[tag='si']").click(function(e){
						$("#sgac #conf_borrar_menu").css("display", "none");
						//Llamada AJAX
							$.post("enlaces/borrar.php", {m_m:m_m, tipo:tipo},function(r){
								$('#sgac div.espera').html(r);
								var retrasar = setTimeout(mov, 3000);
							});
					});
				
			});
});