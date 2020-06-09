<?php

/* crearRecurso.twig.html */
class __TwigTemplate_8912b0748c55248d830af48b3915227d extends Twig_Template
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
        echo "<div id=\"formulario\">
    <form id=\"cambapli\" action=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, 'ruta'), "html");
        echo "\" method=\"post\">
        <input type=\"hidden\" name=\"id\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "\">
        <input type=\"hidden\" name=\"titulo\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\">
        <input type=\"hidden\" name=\"existente\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'existente'), "html");
        echo "\">
        <input type=\"hidden\" name=\"categoriaEle\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, 'categoriaEle'), "html");
        echo "\">
        <input type=\"hidden\" name=\"needEle\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'needEle'), "html");
        echo "\">
        <input type=\"hidden\" name=\"modificado\" value=\"0\">
    </form>
</div>
<script type=\"text/javascript\">
    if('";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
        echo "'!=='0'){ document.forms['cambapli'].submit(); }
    function guardarTemp(urlAplicacion){
        \$(\"#ruta\").html(\"<input type='hidden' name='ruta' value='\"+urlAplicacion+\"' />\");
        document.forms['meta'].submit();
    }
</script>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<div class=\"presentacion\">
    <div>
        <h3 class=\"bienvenida\">
            Ésta es la \"";
        // line 27
        if (($this->getContext($context, 'estado') == "")) {
            echo "creación de recursos educativos";
        } else {
            // line 28
            echo "            edición del recurso educativo ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        }
        echo "\". Recuerde que puede 
            consultar el menú al lado izquierdo o puede \"Cerrar Sesión\" en el enlace
            superior de la página. <br>
            Si utiliza lector de pantalla, recuerda que después de seleccionar el área 
            de conocimiento con barra espaciadora debe utilizar la tecla tab para 
            continuar con la selección de la sub área de conocimiento.<br>
        </h3>
        
        <h3 style=\"color: #982c2c; line-height: normal; text-transform: none; letter-spacing: normal; margin-top: 2em; margin-bottom: 2em; display: inline-block\">
            Advertencia, los objetos educativos creados bajo esta suit de herramientas se crearán bajo 
            la licencia Atribución – No comercial <br>
            <img alt=\"Logotipo de la licencias creative commons\" style=\"width: 5em;\" src=\"../images/licencia.png\"/>
        </h3>
    </div>
    <form id=\"meta\" action=\"crearRecurso.php\" method=\"post\">
        <div id=\"nombreRN\"><label id=\"recurso\" >Título:</label>
        <input autofocus id=\"recursoNuevo\" class=\"title\" name=\"title\" type=\"text\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\" placeholder=\"¡Escriba acá el título del recurso educativo!\" required/></div>
        <div id=\"nombreRN\"><label id=\"recurso\">Descripción:</label>
        <textarea id=\"recursoNuevo\" class=\"textarea1\" name=\"description\" placeholder=\"¡Escriba acá una breve descripción sobre el contenido del recurso educativo!\" required>";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosRE'), "description", array(), "any", false), "html");
        echo "</textarea></div>
        ";
        // line 47
        if (($this->getContext($context, 'estado') != "")) {
            // line 48
            echo "            <div id=\"nombreRN\"><label id=\"recurso\">Estado actual:</label><select id=\"opcionEstado\" class=\"estado\" name=\"estado\" ></select></div>
            <input type=\"hidden\" name=\"id\" value=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\" />
            <input type=\"hidden\" name=\"existente\" value=\"1\" />
            <input type=\"hidden\" name=\"idItem\" value=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getContext($context, 'idItem'), "html");
            echo "\" />
        ";
        } else {
            // line 53
            echo "            <input type=\"hidden\" name=\"estado\" value=\"2\" >
            <input type=\"hidden\" name=\"existente\" value=\"0\" >
        ";
        }
        // line 56
        echo "        <div id=\"nombreRN\">
            <label id=\"recurso\">Área de Conocimiento:</label>
                <select id=\"areasConocimiento\"  onclick=\"obtenerSubCat();\" onkeypress=\"obtenerSubCat();\" class=\"category\" ></select>
                <input id=\"areasConoVal\" type=\"hidden\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, 'areasReprod'), "html");
        echo "\"/>
        </div>
        <div id=\"nombreRN\">
            <label id=\"recurso\">Sub área de Conocimiento:</label>
            <div id=\"subAreasCon\" >
                <!--select id=\"subAreasConocimiento\"  class=\"category\" name=\"category\" ></select-->
            </div>
        </div>
        <div id=\"nombreRN\"><label id=\"recurso\">
                <p class=\"recordar\" style=\"font-size: 0.5em; line-height: normal; margin-bottom: 0em;\">(No olvides seleccionar la sub área de conocimiento)</p>
                Necesidad especial enfocada:</label>
            <select id=\"need\" name=\"need\" onclick=\"obtenerAplicaciones();\" onkeypress=\"obtenerAplicaciones();\" ></select>
        <input id=\"needVal\" type=\"hidden\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->getContext($context, 'needReprod'), "html");
        echo "\"/>
        </div>
        <div id=\"ruta\"></div>
    </form>
    <div id=\"aplicaciones\" >
    ";
        // line 76
        if (($this->getContext($context, 'estado') != "")) {
            // line 77
            echo "        <button id=\"editarSiguiente\" onclick=\"guardarTemp('";
            echo twig_escape_filter($this->env, $this->getContext($context, 'actividad'), "html");
            echo "');\" >SIGUIENTE</button>
    ";
        } else {
            // line 79
            echo "        <header><h2>PARA CONTINUAR, DEBE SELECCIONAR UNA DE LAS SIGUIENTES APLICACIONES:</h2></header>
        <div id=\"aplicacionesValidas\">
            <!--h3 id='actividad'><a><input type='image' id='logo-aplicativo' onclick='guardarTemp(preguntalo);'src='../images/pregunta-lo.png' alt='logo aplicativo preguntas'></a></h3-->
            <!--a><img id='logo-aplicativo' onclick='guardarTemp(preguntalo);' src='../images/pregunta-lo.png' alt='logo aplicativo preguntas'></a-->
        
            
        </div>
    ";
        }
        // line 87
        echo "    </div>
</div>
<input value='";
        // line 89
        echo twig_escape_filter($this->env, $this->getContext($context, 'know'), "html");
        echo "' type=\"hidden\" id='listCono'/>
<input value='";
        // line 90
        echo twig_escape_filter($this->env, $this->getContext($context, 'sKnow'), "html");
        echo "' type=\"hidden\" id='listSubCono'/>
<input value='";
        // line 91
        echo twig_escape_filter($this->env, $this->getContext($context, 'need'), "html");
        echo "' type=\"hidden\" id='listNeed'/>
<input value='";
        // line 92
        echo twig_escape_filter($this->env, $this->getContext($context, 'estado'), "html");
        echo "' type=\"hidden\" id='listEstado'/>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var datos = {need : null};
        \$.post(\"../ajax/habilitarAplicaciones-ajax.php\", datos, function(data) {
            \$(\"#aplicacionesValidas\").html(data);
        });
    var preguntalo=\"question.php\";
    var escribelo = \"escribelo.php\";
    var libro = \"libro.php\";
    var emparejalo = \"emparejado.php\";
    var ordenalo = \"ordenar.php\";
    var enseñalo = \"traductor.php\";
    var ensamblar = \"ensamblar.php\";
    var lista = \$(\"#listCono\").val();
    if (lista.length > 0){\$(\"#areasConocimiento\").html(lista);}
    var lista = \$(\"#listSubCono\").val();
    if (lista.length > 0){
        //\$(\"#subAreasConocimiento\").html(lista);
        \$(\"#subAreasCon\").html(\"<select id='subAreasConocimiento'  class='category' name='category'>\"+lista+\"</select>\");
    }else{
        //\$(\"#subAreasConocimiento\").html(\"<option>Debe elegir un área de conocimiento</option>\");
        \$(\"#subAreasCon\").html(\"<select id='subAreasConocimiento'  class='category' name='category'><option>Debe elegir un área de conocimiento</option></select>\");
    }
    var lista = \$(\"#listNeed\").val();
    if (lista.length > 0){\$(\"#need\").html(lista);}
    var lista = \$(\"#listEstado\").val();
    if (lista.length > 0){\$(\"#opcionEstado\").html(lista);}
    function obtenerSubCat(){
        var area = \$(\"#areasConocimiento\").val();
        if(area > 0){
            var datos = {idArea : area};
            \$.post(\"../ajax/subAreaConocimiento-ajax.php\", datos, function(data) {
                    \$(\"#subAreasCon\").html(data);
                    //\$(\"subAreasConocimiento\").html(data);
            });
        }
    }
    function limpiarDato(v){
        v = v.replace(/deletrear/g, \"\");
        v = v.replace(/de letrear/g, \"\");
        v = v.replace(/ /g, \"\");
        return v;
    }
    function obtenerAplicaciones(){
        var needEle = \$(\"#need\").val();
        habilAplicaciones(needEle);
    }
    function habilAplicaciones(need){
        var datos = {need : need};
        \$.post(\"../ajax/habilitarAplicaciones-ajax.php\", datos, function(data) {
            \$(\"#aplicacionesValidas\").html(data);
        });
    }
    function normalize (str) {
        var from = \"ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;:-_^¨{}[]*+~¡?¿!#\$%&/()=°!|ºª\";
        var to   = \"AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuucc\";
        var mapping = {};
        for(var i = 0, j = from.length; i < j; i++ ){mapping[ from.charAt( i ) ] = to.charAt( i );}
        var ret = [];
        for( var i = 0, j = str.length; i < j; i++ ) {var c = str.charAt( i );if( mapping.hasOwnProperty( str.charAt( i ) ) ){ret.push( mapping[ c ] );}else{ret.push( c );}}      
        var respuesta=ret.join('');
        respuesta=respuesta.toLowerCase();
        return respuesta.replace(/ /g, \"\");
    }
    var onload = function cargarRE (){
        habilAplicaciones(null);
        if('";
        // line 162
        echo twig_escape_filter($this->env, $this->getContext($context, 'estado'), "html");
        echo "'!=\"\"){
            var ubicacion = \"edición del recurso educativo ";
        // line 163
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\";
        }else{
            var ubicacion = \"creación de recursos educativos\";
        }
        var texto = \"Estas en la \"+ubicacion+\". Recuerde que puede consultar el menú o puede cerrar sesión. Pero si desea continuar en esta operación, solo pronuncie la palabra seguir.\";
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {
                    'cerrar sesión':function(){window.location=\"cierre.php\";},//cerrar la sesión del recurso educativo
                    'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra crear, editar o eliminar según la acción que requieras utilizar.\"; 
                        sintetizadorVoz(texto);
                    },//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las paginas
                    'presentación':function(){window.location=\"principal.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'seguir' :function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Para asignar el título del recurso, solo debe mensionar la palabra título seguido del nombre que asignara al recurso.\";
                        sintetizadorVoz(texto);
                    },
                    'título *v' :function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"El título es \"+v+\". Para continuar pronuncie la palabra descripción y hable un poco sobre el recurso educativo.\";
                        sintetizadorVoz(texto);
                        \$('.title').val(v);
                    },
                    'descripción *v' :function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"La descripción es \"+v+\" Para continuar pronuncie area de conocimiento y el sistema le informara de las areas de conocimiento validas.\";
                        sintetizadorVoz(texto);
                        \$('.textarea1').val(v);
                    },
                    'área de conocimiento':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Las areas de conocimiento que usted puede elegir son: \"+ \$(\"#areasConoVal\").val()+\" Al pronunciar seleccionar area seguido por el numero respectivo de la opción, el área le sera asignado al recurso.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar área *v':function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var vi = \".\"+normalize(v);
                        if(\$(vi).val()==null){
                            var texto = \"Lo siento, esta área no existe, intente nuevamente mensionando las palabras área de conocimiento\";
                        }else{
                            v=\".\"+v;
                            v=\$(v).html();
                            var texto = \"Usted a elegido el area de conocimiento llamado \"+v+\" Para continuar mensione subcategoría\";
                            jQuery(vi).attr('selected', 'selected');
                            obtenerSubCat();
                        }
                        sintetizadorVoz(texto);
                    },
                    'subcategoría':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var titulo = \$(\"#subAreas\").val();
                        var texto=\"Las sub areas de conocimiento validas son: \"+titulo+\"Al mensionar seleccionar subcategoría seguido del numero de la opción, la sub area de conocimiento estara cargada al recurso educativo.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar subcategoría *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var vi = \".\"+normalize(v);
                        if(\$(vi).val()==null){
                            var texto = \"Lo siento, esta área no existe, intente nuevamente mensionando las palabras área de conocimiento\";
                        }else{
                            v=\".\"+v;
                            v=\$(v).html();
                            var texto = \"Usted a elegido la sub área de conocimiento llamado \"+v+\" Para continuar mensione necesidad para identificar los tipos de necesidades educativas a las que puede ayudar este recurso educativo.\";
                            jQuery(vi).attr('selected', 'selected');
                        }
                        sintetizadorVoz(texto);
                    },
                    'necesidad':function(){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los tipos de necesidades que usted puede atender con este recurso son: \"+\$(\"#needVal\").val()+\". Al pronunciar seleccionar necesidad seguido por el número de la opción, la necesidad especial de educación sera asignado al recurso.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar necesidad *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var vi = \".\"+normalize(v);
                        if(\$(vi).val()==null){
                            var texto = \"Lo siento, esta necesidad especial de educación no es permitida en este recurso educativo, intente nuevamente mensionando necesidad\";
                        }else{
                            v=\".\"+v;
                            v=\$(v).html();
                            var texto = \"Usted a elegido la necesidad especial de educación llamado \"+v+\". Para continuar mensione tipo de aplicaciones. \";
                            jQuery(vi).attr('selected', 'selected');
                            obtenerAplicaciones();
                        }
                        sintetizadorVoz(texto);
                    },
                    'tipo de aplicaciones':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los tipos de aplicaciones a los cuales puede acceder son: \"+ \$(\"#aplicacionesSintetizador\").val()+\". Al pronunciar seleccionar aplicación seguido del nombre completo de la opción.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar aplicación *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        v=normalize(v);
                        if(v==\"preguntalo\"){
                            guardarTemp(preguntalo);
                        }else if(v==\"preguntale\"){
                            guardarTemp(preguntalo);
                        }else if(v==\"preguntado\"){
                            guardarTemp(preguntalo);
                        }else if(v==\"escribelo\"){
                            guardarTemp(escribelo);
                        }else if(v==\"libro\"){
                            guardarTemp(libro);
                        }else if(v==\"emparejalo\"){
                            guardarTemp(emparejalo);
                        }else if(v==\"ordenalo\"){
                            guardarTemp(ordenalo);
                        }else if(v==\"enseñalo\"){
                            guardarTemp(enseñalo);
                        }else{
                            var texto = \"Lo siento, la aplicación solicitada no es valida para el  tipo de necesidad especial de educación actual, por favor intente nuevamente mensionando las palabras tipo de aplicaciones\";
                        sintetizadorVoz(texto);
                        }
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
";
    }

    public function getTemplateName()
    {
        return "crearRecurso.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
