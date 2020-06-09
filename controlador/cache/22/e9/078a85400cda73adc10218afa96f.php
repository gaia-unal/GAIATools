<?php

/* informacionPersonal.twig.html */
class __TwigTemplate_22e9078a85400cda73adc10218afa96f extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'inner' => array($this, 'block_inner'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout.twig.html");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_inner($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"presentacion\">
    <div>
        <h3 class=\"bienvenida\">
            Aquí se presenta su información personal, para verificarla deberá observar
            los datos presentados a continuación, cuando modifique algún dato debe seleccionar
            el botón \"Actualizar\" para guardar la información, o puede hacer otras tareas como gestionar recursos educativos a través del menú que se encuentra a la izquierda de la página.<br> En la parte superior de la página puede seguir el enlace \"Cerrar Sesión\" si desea finalizar.<br><br>
        </h3>
    </div>
<form class=\"contact_form\" id=\"form\" method=\"post\" action=\"informacionPersonal.php\"><div><ul>
    <li><label id=\"nombre\" class=\"nombre\" >Nombre:</label> 
    <input value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "\" autofocus type=\"text\" name=\"nombre\" id=\"nombre\" class=\"name\" placeholder=\"Primer y Segundo Nombre\" required /></li> 
    <li><br><label id=\"apellido\" class=\"apellido\">Apellido(s):</label> 
    <input value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, 'apellido'), "html");
        echo "\" id=\"apellido\" name=\"apellido\" class=\"surname\" type=\"text\" placeholder=\"Primer y Segundo Apellido\" required /></li>
    <li><label id=\"correo\" class=\"correo\" >Correo:</label> 
    <input value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, 'correo'), "html");
        echo "\" id=\"correo\" class=\"email\" type=\"email\" name=\"correo\" placeholder=\"name@ejemplo.com\" required /></li>
    <li><label id=\"genero\" class=\"genero\" >Género</label> 
    ";
        // line 19
        if (($this->getContext($context, 'genero') == "Femenino")) {
            // line 20
            echo "        <input name=\"genero\" type=\"radio\" value=\"Femenino\" id=\"femenino\" class=\"voz\" checked/>Femenino
        <input name=\"genero\" type=\"radio\" value=\"Masculino\" id=\"masculino\" class=\"voz\" />Masculino
        <input id=\"generoActual\" type=\"hidden\" value=\"femenino\" />
    ";
        } elseif (($this->getContext($context, 'genero') == "Masculino")) {
            // line 24
            echo "        <input name=\"genero\" type=\"radio\" value=\"Femenino\" id=\"femenino\" class=\"voz\" />Femenino
        <input name=\"genero\" type=\"radio\" value=\"Masculino\" id=\"masculino\" class=\"voz\" checked />Masculino
        <input id=\"generoActual\" type=\"hidden\" value=\"femenino\" />
    ";
        } else {
            // line 28
            echo "        <input name=\"genero\" type=\"radio\" value=\"Femenino\" id=\"femenino\" class=\"voz\" />Femenino
        <input name=\"genero\" type=\"radio\" value=\"Masculino\" id=\"masculino\" class=\"voz\" />Masculino
        <input id=\"generoActual\" type=\"hidden\" value=\"no fue seleccionado\" />
    ";
        }
        // line 31
        echo "</li>
    <li><label id=\"fecha_nacimiento\" >Fecha de Nacimiento</label>
    <input value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, 'fecha'), "html");
        echo "\" name=\"fecha_nacimiento\" id=\"fecha_nacimiento\" class=\"fecha_nacimiento\" type=\"text\" placeholder=\"DD/MM/AA\" /><br></li>
    <li><label id=\"institucion\" >Institución Educativa</label>
    <input value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getContext($context, 'instituto'), "html");
        echo "\" name=\"institucion\" class=\"institucion\" id=\"institucion\" type=\"text\"  placeholder=\"Universidad Nacional de Colombia\" /></li>
    <br><li><label id=\"nivel\" class=\"nivel\" >Nivel Educativo</label>
    <select name=\"nivel\" class=\"registro\">
        ";
        // line 38
        if (($this->getContext($context, 'nivel') == "No Definido")) {
            echo "<option id=\"nodefinido\" selected>No Definido</option>";
        } else {
            echo "<option id=\"nodefinido\" >No Definido</option>";
        }
        // line 39
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Básica Primaria")) {
            echo "<option id=\"basicaprimaria\" selected>Básica Primaria</option>";
        } else {
            echo "<option id=\"basicaprimaria\">Básica Primaria</option>";
        }
        // line 40
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Básica Secundaria")) {
            echo "<option id=\"basicasecundaria\" selected>Básica Secundaria</option>";
        } else {
            echo "<option id=\"basicasecundaria\">Básica Secundaria</option>";
        }
        // line 41
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Educación Media")) {
            echo "<option id=\"educacionmedia\" selected>Educación Media</option>";
        } else {
            echo "<option id=\"educacionmedia\">Educación Media</option>";
        }
        // line 42
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Educación Superior")) {
            echo "<option id=\"educacionsuperior\" selected>Educación Superior</option>";
        } else {
            echo "<option id=\"educacionsuperior\">Educación Superior</option>";
        }
        // line 43
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Carrera Técnica/Tecnológica")) {
            echo "<option id=\"carreratecnicaotecnologica\" selected>Carrera Técnica/Tecnológica</option>";
        } else {
            echo "<option id=\"carreratecnicaotecnologica\">Carrera Técnica/Tecnológica</option>";
        }
        // line 44
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Pregrado")) {
            echo "<option id=\"pregrado\" selected>Pregrado</option>";
        } else {
            echo "<option id=\"pregrado\">Pregrado</option>";
        }
        // line 45
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Especialización")) {
            echo "<option id=\"especializacion\" selected>Especialización</option>";
        } else {
            echo "<option id=\"especializacion\">Especialización</option>";
        }
        // line 46
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Maestría")) {
            echo "<option id=\"maestria\" selected>Maestría</option>";
        } else {
            echo "<option id=\"maestria\">Maestría</option>";
        }
        // line 47
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Doctorádo")) {
            echo "<option id=\"doctorado\" selected>Doctorádo</option>";
        } else {
            echo "<option id=\"doctorado\">Doctorádo</option>";
        }
        // line 48
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Posdoctorado")) {
            echo "<option id=\"posdoctorado\" selected>Posdoctorado</option>";
        } else {
            echo "<option id=\"posdoctorado\">Posdoctorado</option>";
        }
        // line 49
        echo "    </select><input type=\"hidden\" id=\"listaNivelEducativo\" value=\"No Definido, Básica Primaria, Básica Secundaria, Educación Media, Educación Superior, Carrera Técnica o Tecnológica, Pregrado, Especialización, Maestría, Doctorádo o Posdoctorado.\" />
        ";
        // line 50
        if (($this->getContext($context, 'nivel') == "No Definido")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"No Definido\" />";
        }
        // line 51
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Básica Primaria")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Básica Primaria\" />";
        }
        // line 52
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Básica Secundaria")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Básica Secundaria\"/>";
        }
        // line 53
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Educación Media")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\">Educación Media\" />";
        }
        // line 54
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Educación Superior")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Educación Superior\" />";
        }
        // line 55
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Carrera Técnica/Tecnológica")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Carrera Técnica o Tecnológica\" />";
        }
        // line 56
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Pregrado")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Pregrado\" />";
        }
        // line 57
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Especialización")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Especialización\" />";
        }
        // line 58
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Maestría")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Maestría\" />";
        }
        // line 59
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Doctorádo")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Doctorádo\" />";
        }
        // line 60
        echo "        ";
        if (($this->getContext($context, 'nivel') == "Posdoctorado")) {
            echo "<input id=\"niveleducativo\" type='hidden' value=\"Posdoctorado\" />";
        }
        // line 61
        echo "   </li>
    <li><label id=\"need\" class=\"need\">Tipo de discapacidad</label><select name=\"need\" id='listaNeed' class=\"registro\"></select><input type=\"hidden\" id=\"needActual\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getContext($context, 'needActual'), "html");
        echo "\"/><input type=\"hidden\" id=\"opcionesNeed\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, 'opcionesNeed'), "html");
        echo "\"/></li>
    <li><center><br><label style='color: #080'>";
        // line 63
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br></center></li>
    <li><input type=\"submit\" id=\"iniciar\" class=\"ini\" value=\"ACTUALIZAR\" ></li>
</ul></div></form>
<input value='";
        // line 66
        echo twig_escape_filter($this->env, $this->getContext($context, 'need'), "html");
        echo "' type=\"hidden\" id='lista'/>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var lista = \$(\"#lista\").val();
    if (lista.length>0){ \$(\"#listaNeed\").html(lista); }
    var onload = function cargarRE (){
        
        var texto=\"\";
        if ('";
        // line 77
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'==\"\"){
            texto = \"Aquí se presenta su información personal, para verificarla pronuncie seguir, o pronunce menú, recuerde que para finalizar su sesión de usuario debe mensionar cerrar sesión.\"; //agregar instrucciones.
        }else{ 
            texto = '";
        // line 80
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'+\". Recuerda que puedes utilizar el menu o cerrar sesión.\"; 
        }
        sintetizadorVoz(texto);
    }
    function leerDatosPersonales(){
        gcse.pause();
        gcse.src = \"\";
        var texto = \"Su nombre es \"+\$('.name').val()+\". Su apellido es \"+\$('.surname').val()+\". Su correo electronico es \"+\$('.email').val()+\". Su genero es \"+\$('#generoActual').val()+\". Su fecha de nacimiento es \"+\$('.fecha_nacimiento').val()+\". Su institución es \"+\$('.institucion').val()+\". Su nivel educativo es \"+\$('#niveleducativo').val()+\". Su tipo de discapacidad es \"+\$('#needActual').val()+\". Para guardar cambios pronuncie actualizar.\";
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Pero tambien puedes realizar operaciones sobre los recursos educativos, solo debes mencionar la palabra visualizar, crear, editar o eliminar según la acción que requieras utilizar\"; 
                        sintetizadorVoz(texto);
                    },//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las paginas
                    'presentación':function(){window.location=\"principal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'crear':function(){window.location=\"crearRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'seguir' : function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Le diremos su información personal, cuando requiera cambiar un dato debe mensionar la misma palabra clave que en esta grabación se pronuncia seguido por el dato, por ejemplo su nombre es \"+'";
        // line 111
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "'+\" y para usted modificarlo debe pronunciar nombre y consecutivamente mensionar su verdadero nombre. Luego debe pronunciar la palabra continuar para verificar los datos.\";
                        sintetizadorVoz(texto);
                        leerDatosPersonales();
                    },
                    'continuar' : function(){
                        leerDatosPersonales();
                    },
                    'nombre *v' : function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"Su nombre es \"+v+\". Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        \$('.name').val(v);
                    },
                    'apellido *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"Su apellido es \"+v+\". Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        \$('.surname').val(v);
                    },
                    'correo *v' : function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        /*var texto = \"Su correo electrónico es \"+v+\". Para continuar \\n\\
                                    pronuncie hay que identificar su genero, mensione \\n\\
                                    la palabra femenino o masculino \";*/
                        v = v.replace(\"arroba\",\"@\");
                        v = v.replace(/ /g, \"\");
                        v = normalize(v);
                        var texto = \"Su correo electrónico es \"+v+\". Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        \$('.email').val(v); 
                    },
                    'femenino': function(){
                        jQuery(\"#femenino\").attr('checked', true);
                        var texto = \"Su genero sexual es femenino. Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                    },
                    'masculino': function(){
                        jQuery(\"#masculino\").attr('checked', true);
                        var texto = \"Su genero sexual es masculino. Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                    },
                    'día *v':function(v){
                        var texto = \"Su dia de nacimiento fue \"+v+\". Continúe con el mes diciendo mes seguido del número del mes correspondiente a su nacimiento.\";
                        sintetizadorVoz(texto);
                        var dia=v+\"/\";
                        if(\$(\".fecha_nacimiento\").val()!=\"\"){
                            var dato = \$(\"#fecha_nacimiento\").val();
                            var pos = dato.indexOf(\"/\");
                            if(pos>-1){
                                dato = dato.substring(pos+1);
                                dia = dia+dato;
                            }else{
                                texto = \"hay un error, por favor mensione nuevamente la palabra día.\";
                                sintetizadorVoz(texto);
                                dia=\"\";
                            }
                        }
                        \$('.fecha_nacimiento').val(dia);
                    },
                    'mes *v':function(v){
                        var texto = \"Su mes de nacimiento fue \"+v+\". Continúe con el año diciendo año seguido año correspondiente a su nacimiento.\";
                        sintetizadorVoz(texto);
                        var mes=v+\"/\";
                        if(\$(\".fecha_nacimiento\").val()!=\"\"){
                            var dato = \$(\".fecha_nacimiento\").val();
                            var pos = dato.indexOf(\"/\");
                            if(pos>-1){
                                dato = dato.substring(0,pos+1);
                                mes = dato+mes;
                                dato = dato.substring(pos+1);
                                pos = dato.indexOf(\"/\");
                                if(pos>-1){
                                    dato = dato.substring(pos+1);
                                    mes = mes+dato;
                                }
                            }else{
                                texto = \"hay un error, por favor mensione nuevamente la palabra día.\";
                                sintetizadorVoz(texto);
                                mes=\"\";
                            }
                        }
                        \$('.fecha_nacimiento').val(mes);
                    },
                    'año *v':function(v){
                        var texto = \"Su año de nacimiento fue \"+v+\". Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        var año=v;
                        if(\$(\".fecha_nacimiento\").val()!=\"\"){
                            var dato = \$(\".fecha_nacimiento\").val();
                            var pos = dato.lastIndexOf(\"/\");
                            if(pos>-1){
                                dato = dato.substring(0,pos+1);
                                año = dato+año;
                            }else{
                                texto = \"hay un error, por favor mensione nuevamente la palabra día.\";
                                sintetizadorVoz(texto);
                                año=\"\";
                            }
                        }
                        \$('.fecha_nacimiento').val(año);
                        texto = \"Su fecha de nacimiento es \"+\$('.fecha_nacimiento').val()+\" recuerde continuar con la institución.\";
                        sintetizadorVoz(texto);
                    },
                    'institución *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"Su institución es \"+v+\". Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        \$('.institucion').val(v);
                    },
                    'nivel educativo':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los niveles educativos válidos son: \"+\$(\"#listaNivelEducativo\").val()+\" Recuerda pronunciar seleccionar nivel seguido del nombre completo de la opción.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar nivel *v':function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"usted a elegido el nivel educativo \"+v+\" Para continuar mensione tipo de discapacidad y le serán leídas las opciones. Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        var vi = \"#\"+normalize(v);
                        jQuery(vi).attr('selected', 'selected');
                        \$('#niveleducativo').val(v);
                    },
                    'tipo de discapacidad':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los tipos de discapacidad válidos son: \"+\$(\"#opcionesNeed\").val()+\" Recuerda pronunciar seleccionar necesidad seguido del nombre completo de la opción.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar necesidad *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Usted a elegido la \"+v+\" Para guardar cambios pronuncie actualizar o seguir para rectificar los datos nuevamente.\";
                        sintetizadorVoz(texto);
                        var vi = \"#\"+normalize(v);
                        jQuery(vi).attr('selected', 'selected');
                    },
                    'actualizar':function(){
                        document.forms['form'].submit();  
                    }
                };
                // OPTIONAL: activate debug mode for detailed logging in the console
                annyang.debug();
                // Add voice commands to respond to
                annyang.addCommands(commands);
                // OPTIONAL: Set a language for speech recognition (defaults to English)
                annyang.setLanguage('es');
                // Start listening. You can call this here, or attach this call to an event, button, etc.
                annyang.start();
            } else {
                \$(document).ready(function() {
                    \$('#unsupported').fadeIn('fast');
                });
            }
        //}
</script>
</div>
";
    }

    public function getTemplateName()
    {
        return "informacionPersonal.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
