<!DOCTYPE HTML>
<html lang="es">
	<!--
		SGAC | CPW Online
			- Versión 1.0.3
	-->
	<head>
		<title>SGAC | CPW Online</title>
		
		<?php
			require_once('mysqli_db.php');
			session_start();
		?>
		<!--Links de CSS-->
			<link rel="stylesheet" href="css/estilo-mod.css"/>
			<link rel="stylesheet" href="css/estilo-gen.css"/>
			<link rel="stylesheet" href="css/estilo-mi_info.css"/>
		<!--Links de JS-->
			<script src="js/jquery-3.0.0.min.js"></script>
			<script src="js/func-gen.js"></script>
			<script src="js/func-ope.js"></script>
			<script src="js/func-inf.js"></script>
			<script src="js/func-images.js"></script>
	</head>
	<body id="sgac">
		<div class="espera">Espere un momento... | <span>CPW Online</span></div>
		<?php
			//Comprobado del inicio de sesión
			if(empty($_SESSION['u_nombre'])){
		?>
				<section class="inicio_sesion">
					<h3>¡Bienvenido a SGAC!</h3>
					<h4>El sistema que le ayudar&aacute; a gestionar sus contenidos.</h4>
					<input type="text" name="u_nombre" placeholder="Usuario"/>
					<input type="password" name="u_clave" placeholder="Contrase&ntilde;a"/><br>
					<input type="hidden" name="contador" value="1"/>
					<button class="btn-gen" id="iniciar_sesion">Entrar</button>
					<button class="btn-gen2">Olvid&eacute; mi contrase&ntilde;a</button>
				</section>
		<?php
			}else{
		?>
	<!--Cabecera-->
		<header class="cabecera">
			<section class="logo">
				<h3>SGAC | Ultimate</h3>
			</section>
			<nav class="menu">
				<ul class="menu_prin">
					<li tag="menus"><i class="img_col menus blan"></i><a>Men&uacute;s</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="articulos"><i class="img_col articulos blan"></i><a>Art&iacute;culos</a></li>
					<li tag="informaciones"><i class="img_col informaciones blan"></i><a>Informaciones</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="diagnostico"><i class="img_col diagnostico blan"></i><a>Diagn&oacute;stico de errores</a></li>
					<li tag="estadisticas"><i class="img_col estadisticas blan"></i><a>Estad&iacute;sticas</a></li>
				</ul>
				<ul class="menu_prin">
					<li tag="ajustes"><i class="img_col ajustes blan"></i><a>Ajustes</a></li>
					<li tag="ayuda"><i class="img_col ayuda blan"></i><a>Ayuda</a></li>
					<li tag="acercade"><i class="img_col acercade blan"></i><a>Acerca de</a></li>
				</ul>
			</nav>
		</header>
		
	<!--Contenedor-->
		<section class="contenedor">
			<!--Principal-->
			<section class="inf_prin">
				<span>Bienvenido <i><?=$_SESSION['u_nombre']?></i> | SGAC &nbsp; <a href="#" class="cerrar_sesion btn-gen2">Cerrar sesi&oacute;n</a></span>
			</section>
			<!--Menús-->
				<article class="art_gen" id="art_1" tag="menus">
					<h3>Men&uacute;s</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Añadir menú-->
								<article class="bloque b1">
									<h4>A&ntilde;adir un men&uacute;s</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="m_titulo" placeholder="Escriba el t&iacute;tulo de su men&uacute;"/></div>
										</div>
										<div class="fil">
											<div class="cam">Posici&oacute;n:</div>
											<div class="cam">
												<select name="m_posicion">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="guarda_menu">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Añadir submenú-->
								<article class="bloque b1">
									<h4>A&ntilde;adir un submen&uacute;s</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="s_titulo" placeholder="Escriba el t&iacute;tulo de su submen&uacute;"/></div>
										</div>
										<div class="fil">
											<div class="cam">Posici&oacute;n:</div>
											<div class="cam">
												<select name="s_posicion">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam">Men&uacute; al que pertenece:</div>
											<div class="cam">
												<select name="s_menu">
													<?php
														$con = $mysqli->query("SELECT m_titulo FROM menus ORDER BY m_freg DESC");
														if($con->num_rows === 0){
															echo "<div class='uni'><option>No hay resultados.</option></div>";
														}
														while($ro = $con->fetch_assoc()){
															$m_titulo = $ro['m_titulo'];
													?>
																<option value="<?=$m_titulo?>"><?=$m_titulo?></option>
													<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="guarda_sub">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Mis menús-->
								<article class="bloque b2">
									<h4>Mis men&uacute;s
										<i class="img_col actualizar neg boton" tag="menus"></i>
									</h4>
									<div class="tabla_gen menus">
										<!--PARTE: MENUS-->
									</div>
								</article>
							<!--Mis submenús-->
								<article class="bloque b2">
									<h4>Mis submen&uacute;s
										<i class="img_col actualizar neg boton" tag="submenus"></i>
									</h4>
									<div class="tabla_gen submenus">
										<!--PARTE: SUBMENUS-->
									</div>
								</article>
						<!--Fin Artículos de una cabecera-->
					</section>
				</article>
			<!--Artículos-->
				<article class="art_gen" id="art_2" tag="articulos">
					<h3>Art&iacute;culos</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Añadir artículo-->
								<article class="bloque b2">
									<h4>A&ntilde;adir un art&iacute;culo</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">T&iacute;tulo:</div>
											<div class="cam"><input type="text" name="a_titulo" placeholder="Escriba el t&iacute;tulo de su art&iacute;culo"/></div>
										</div>
									</div>
								</article>
								<article class="bloque b2">
									<h4>A&ntilde;adir texto del art&iacute;culo</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam"><textarea name="a_contenido" placeholder="Escriba el contenido de su art&iacute;culo"></textarea></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="guarda_art">Guardar</a></div>
										</div>
									</div>
								</article>
							<!--Mis artículos-->
								<article class="bloque b2">
									<h4>
										Mis art&iacute;culos
										<i class="img_col actualizar neg boton" tag="articulos"></i>
									</h4>
									<div class="tabla_gen articulos">
										<!--PARTE: ARTÍCULOS-->
									</div>
								</article>
					</section>
				</article>
			<!--Informaciones-->
				<article class="art_gen" id="art_3" tag="informaciones">
					<h3>Informaciones</h3>
					<section class="dentro_art">
							<!--Localización de la información-->
								<article class="bloque b1">
									<h4>PASO 1: Localizaci&oacute;n de la inf.</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam"><span>A&ntilde;adir informaci&oacute;n en: </span></div>
											<div class="cam">
												<select name="i_menu">
													<option value="">Seleccione...</option>
													<?php
														$con = $mysqli->query("SELECT * FROM menus ORDER BY m_posicion, m_freg DESC");
														while($ro = $con->fetch_array()){
															$m_id = $ro['m_id'];
															$m_titulo = $ro['m_titulo'];
															echo '<option value="'.$m_titulo.'">'.$m_titulo.'</option>';
														}
													?>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><span>Submen&uacute;: </span></div>
											<div class="cam">
												<select name="i_sub"><option value="">Seleccione...</option></select>
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="configura_inf">Configurar</a></div>
										</div>
									</div>
								</article>
							<!--Básico de una información-->
								<article class="bloque b1 repentino" tag="rep_inf_1">
									<h4>PASO 2: B&aacute;sico de una informaci&oacute;n</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">
												<select name="i_disegno">
													<option value="">Dise&ntilde;o</option>
													<option value="1">Contenido centrado</option>
													<option value="2">Contenido centrado (izquierda) y bot&oacute;n de contacto (derecha)</option>
													<option value="3">Contenido centrado (arriba) y bot&oacute;n de contacto (debajo)</option>
													<option value="4">T&iacute;tulo (arriba)  y contenido centrado (debajo)</option>
													<option value="5">T&iacute;tulo (izquierda)  y contenido centrado (derecha)</option>
													<option value="6">T&iacute;tulo (derecha)  y contenido centrado (izquierda)</option>
												</select>	
											</div>
											<div class="cam">
												<select name="i_posicion">
													<option value="">Posici&oacute;n</option>
												</select>	
											</div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" tag="busca_pos">Buscar posiciones</a></div>
										</div>
									</div>
								</article>
							<!--Añadir el contenido-->
								<article class="bloque b2 repentino" tag="rep_inf_2">
									<h4>PASO 3: A&ntilde;adir el contenido</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam"><input type="text" name="i_titulo" placeholder="T&iacute;tulo"/></div>
										</div>
										<div class="fil">
											<div class="cam"><textarea name="i_contenido" placeholder="Contenido"></textarea></div>
										</div>
										<div class="fil">
											<div class="cam">Color de fondo: <input type="color" name="i_colorFondo"/></div>
										</div>
										<div class="fil">
											<div class="cam">Color de letra: <input type="color" name="i_colorLetra"/></div>
										</div>
										<div class="fil">
											<div class="cam">URL del bot&oacute;n: <input type="url" name="i_url"/></div>
											<div class="cam">Texto del bot&oacute;n: <input type="url" name="i_texto_url"/></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" tag="agrega_inf">Agregar informaci&oacute;n</a></div>
										</div>
									</div>
									<br><p style="margin-bottom:.5cm;color:#777;">Le recordamos que estas <i>informaciones</i> son muy parecidas a <i>banners</i>, bloques o secciones en donde usted podr&aacute; mostrar alguna informaci&oacute;n de manera elegante</p>
								</article>
							<!--Resultado de la información-->
								<article class="bloque b2" tag="rep_inf_3">
									<h4>Resultado</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam" tag="object_inf"></div>
										</div>
									</div>
								</article>
							<!--Mis informaciones-->
								<article class="bloque b2">
									<h4>Mis informaciones</h4>
									<div class="tabla_gen">
										<!--PARTE: INFORMACIONES-->
									</div>
								</article>
					</section>
				</article>
			<!--Diagnóstico de errores-->
				<article class="art_gen" id="art_4" tag="diagnostico">
					<h3>Diagn&oacute;stico de errores</h3>
					<section class="dentro_art">
						<!--Artículos de una cabecera-->
							<!--Diagnosticar un error-->
								<article class="bloque b2">
									<h4>Informar acerca de un error</h4>
									<div class="tabla_gen">
										<div class="fil">
											<div class="cam">Estado:</div>
											<div class="cam">
												<select name="inf_pos">
													<option value="Normal">Normal</option>
													<option value="Preocupante">Preocupante</option>
													<option value="Urgente">Urgente</option>
													<option value="Alarmante">Alarmante</option>
												</select>
											</div>
										</div>
										<div class="fil">
											<div class="cam">Describa el error:</div>
											<div class="cam"><textarea name="inf_cont" placeholder="Sea detallista"></textarea></div>
										</div>
										<div class="fil">
											<div class="cam">URL del error:</div>
											<div class="cam"><input type="url" name="inf_cont" placeholder="Escriba la URL de la p&aacute;gina donde encontr&oacute; el error"/></div>
										</div>
										<div class="fil">
											<div class="cam"><a class="btn-gen" id="enviar_diag">Enviar</a></div>
										</div>
									</div>
								</article>
					</section>
				</article>
			<!--Estadísticas-->
				<article class="art_gen" id="art_5" tag="estadisticas">
					<h3>Estad&iacute;sticas</h3>
					<section class="dentro_art">
						<!--Visitas: Hoy-->
							<article class="bloque b2">
								<h4>Visitas: Hoy</h4>
								<div class="tabla_gen">
									<div class="fil pr">
										<div class="cam">7am - 12pm</div>
										<div class="cam">12pm - 6pm</div>
										<div class="cam">6pm - 10pm</div>
										<div class="cam">10pm - 7am</div>
									</div>
									<div class="fil">
										<div class="cam">5 visita(s)</div>
										<div class="cam">8 visita(s)</div>
										<div class="cam">2 visita(s)</div>
										<div class="cam">1 visita(s)</div>
									</div>
								</div>
							</article>
						<!--Visitas: Esta semana-->
							<article class="bloque b2">
								<h4>Visitas: Esta semana</h4>
								<div class="tabla_gen">
									<div class="fil pr">
										<div class="cam">Lunes</div>
										<div class="cam">Martes</div>
										<div class="cam">Mi&eacute;rcoles</div>
										<div class="cam">Jueves</div>
										<div class="cam">Viernes</div>
										<div class="cam">S&aacute;bado</div>
										<div class="cam">Domingo</div>
									</div>
									<div class="fil">
										<div class="cam">34</div>
										<div class="cam">342</div>
										<div class="cam">45</div>
										<div class="cam">34</div>
										<div class="cam">43</div>
										<div class="cam">453</div>
										<div class="cam">234</div>
									</div>
								</div>
							</article>
						<!--Visitas: Este mes-->
							<article class="bloque b2">
								<h4>Visitas: Este mes</h4>
								<div class="tabla_gen">
									<div class="fil pr">
										<div class="cam">1 semana</div>
										<div class="cam">2 semana</div>
										<div class="cam">3 semana</div>
										<div class="cam">4 semana</div>
									</div>
									<div class="fil">
										<div class="cam">3344</div>
										<div class="cam">3542</div>
										<div class="cam">4345</div>
										<div class="cam">3344</div>
									</div>
								</div>
							</article>
						<!--Visitas: Este año-->
							<article class="bloque b2">
								<h4>Visitas: Este a&ntilde;o</h4>
								<div class="tabla_gen">
									<div class="fil pr">
										<div class="cam">Enero</div>
										<div class="cam">Febrero</div>
										<div class="cam">Marzo</div>
										<div class="cam">Abril</div>
										<div class="cam">Mayo</div>
										<div class="cam">Junio</div>
									</div>
									<div class="fil">
										<div class="cam">25245</div>
										<div class="cam">832478</div>
										<div class="cam">5424</div>
										<div class="cam">435435</div>
										<div class="cam">45345</div>
										<div class="cam">45654</div>
									</div>
									<div class="fil pr">
										<div class="cam">Julio</div>
										<div class="cam">Agosto</div>
										<div class="cam">Septiembre</div>
										<div class="cam">Octubre</div>
										<div class="cam">Noviembre</div>
										<div class="cam">Diciembre</div>
									</div>
									<div class="fil">
										<div class="cam">213123</div>
										<div class="cam">345435</div>
										<div class="cam">3455</div>
										<div class="cam">234234</div>
										<div class="cam">123213</div>
										<div class="cam">56464</div>
									</div>
								</div>
							</article>
					</section>
				</article>
			<!--Ajustes-->
				<article class="art_gen" id="art_6" tag="ajustes">
					<h3>Ajustes</h3>
					<section class="dentro_art">
						<!--Cambiar clave-->
							<article class="bloque b1">
								<h4>Cambiar clave</h4>
								<div class="tabla_gen">
									<div class="fil">
										<div class="cam">Clave actual:</div>
										<div class="cam"><input type="password" name="ant_clave" placeholder="Escriba su actual clave"/></div>
									</div>
									<div class="fil">
										<div class="cam">Clave nueva:</div>
										<div class="cam"><input type="password" name="nueva_clave" placeholder="Escriba su nueva clave"/></div>
									</div>
									<div class="fil">
										<div class="cam">Repita su clave actual:</div>
										<div class="cam"><input type="password" name="repita_clave" placeholder="Reescriba su actual clave"/></div>
									</div>
									<div class="fil">
										<div class="cam"><a class="btn-gen" id="editar_clave">Guardar</a></div>
									</div>
								</div>
							</article>
					</section>
				</article>
			<!--Ayuda-->
				<article class="art_gen" id="art_7" tag="ayuda">
					<h3>Ayuda</h3>
					<section class="dentro_art">
						<!--Ayuda general-->
							<article class="bloque b2">
								<h4>Ayuda general</h4>
								<div class="tabla_gen">
									<div class="fil">
										<div class="cam">Descargue nuestros PDF's para poder saber todas las informaciones.</div>
									</div>
									<div class="fil">
										<div class="cam">Entre en <a href="https://www.cpwonline.com.ve/informacion/" target="_blank">CPW Online > Informaciones</a></div>
									</div>
									<div class="fil">
										<div class="cam">O comun&iacute;quese con nosotros a trav&eacute;s de nuestras redes sociales.</div>
									</div>
								</div>
							</article>
					</section>
				</article>
			<!--Acerca de-->
				<article class="art_gen" id="art_8" tag="acercade">
					<h3>Acerca de</h3>
					<section class="dentro_art">
						<!--Acerca de-->
							<article class="bloque b2">
								<h4>¡Somos CPW Online!</h4>
								<div class="tabla_gen">
									<div class="fil">
										<div class="cam">Descargue nuestros PDF's para poder saber todas las informaciones.</div>
									</div>
									<div class="fil">
										<div class="cam">Entre en <a href="https://www.cpwonline.com.ve/informacion/#acercade" target="_blank">CPW Online > Informaciones</a>.</div>
									</div>
								</div>
							</article>
					</section>
				</article>

		</section>
		<footer class="pie">
			<!--
			//Tabla general
			<div class="dentro_bloque">
				<div class="fil pr">
					<div class="cam">jun</div>
					<div class="cam">jun1</div>
					<div class="cam">jun2</div>
				</div>
				<div class="fil">
					<div class="cam">dam</div>
					<div class="cam">dam1</div>
					<div class="cam">dam2</div>
				</div>
				<div class="fil">
					<div class="cam">ada</div>
					<div class="cam">ada1</div>
					<div class="cam">ada2</div>
				</div>
			</div>
			-->
		</footer>
	<?php
		}
	?>
	<!--MODALES-->
		<!--Modal de conf_borrar_gen------------------------------------------------>
			<div class="gen_modal" id="conf_borrar_gen">
				<div class="modal-content">
					<div class="header otro"><h2>Confirmaci&oacute;n</h2></div>
					<div class="copy" id="copy">
						<p style="text-align: center;">
							<span tag="1">¿Est&aacute; seguro de borrar</span>
							<span tag="2"></span>
						</p>
					</div>
					<div class="cf footer">
						<section class="cont_a">
							<a class="btn-gen2" onclick="$('#sgac #conf_borrar_gen').css('display','none');" tag="cancelar">Cancelar</a>
							<a class="btn-gen" tag="si" href="#">S&iacute;</a>
						</section>
					</div>
				</div>
				<div class="overlay"></div>
			</div>
		<!--Modal de conf_borrar_gen------------------------------------------------->
		
	</body>
</html>