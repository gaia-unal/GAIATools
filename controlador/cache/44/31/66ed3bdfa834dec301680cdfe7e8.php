<?php

/* registro.twig.html */
class __TwigTemplate_443166ed3bdfa834dec301680cdfe7e8 extends Twig_Template
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
        echo "<div id=\"formulario\"></div>

  <script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
  <script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    if('";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'==\"Usuario creado con exito, a continuación se validara de forma automática su usuario.\"){ alert('";
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'); redireccionar(); }
    function redireccionar(){
        \$(\"#formulario\").html(\"<form id='cambapli' action='validar.php' method='post'>\\n\\
                                <input type='hidden' name='user' value='\"+'";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, 'usuario'), "html");
        echo "'+\"' />\\n\\
                                <input type='hidden' name='pass' value='\"+'";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'clave'), "html");
        echo "'+\"' /></form>\");
        document.forms['cambapli'].submit();
    }
</script>
<div class=\"inner\">
    <div>
        <h3 class=\"bienvenida\" autofocus>
            Ésta es la página de registro de usuarios para la herramienta GAIATools.<br>
            Para registrarse digite los datos presentados a continuación, y luego seleccione el<br>
            botón \"REGISTRAR\" ubicado en la parte inferior de la página, si no, puede seleccionar<br>
            el botón \"ATRÁS\" para regresar a la página inicial, o si ya tiene un usuario registrado<br>
            continúe con el enlace \"Iniciar Sesión\" en la parte superior de la página.<br><br>
        </h3>
    </div>
<form class=\"contact_form\" id=\"registro\" method=\"post\" action=\"registro.php\"><div><ul>
    <li><label id=\"nombre\" class=\"nombre\">Nombre:</label>
    <input type=\"text\" name=\"nombre\" id=\"nombre\" class=\"name\" placeholder=\"Primer y Segundo Nombre\" required autofocus /> </li> 
    <li><label id=\"apellido\" class=\"apellido\">Apellido(s):</label> 
    <input id=\"apellido\" name=\"apellido\" class=\"surname\" type=\"text\" placeholder=\"Primer y Segundo Apellido\" /></li>
    <li><label id=\"correo\" class=\"correo\" >Correo:</label> 
    <input id=\"correo\" class=\"email\" type=\"email\" name=\"correo\" placeholder=\"name@ejemplo.com\" required /></li>
    <li><label id=\"genero\" class=\"genero\" >Género</label> 
        <input name=\"genero\" type=\"radio\" value=\"Femenino\" id=\"femenino\" class=\"voz\"/>Femenino
        <input name=\"genero\" type=\"radio\" value=\"Masculino\" id=\"masculino\" class=\"voz\" />Masculino
        <input name=\"genero\" type=\"radio\" value=\"Indeterminado\" id=\"indeterminado\" class=\"voz\" />Indeterminado
    </li>
    <li><label id=\"fecha_nacimiento\" class=\"fecha_nacimiento\" alt=\"Recuerda, primero dia, mes y finaliza con año, separados con / (slash)\">
            Fecha de Nacimiento
            <p class=\"recordar\" style=\"font-size: 0.5em; line-height: normal; margin-bottom: 0em;\">(DD/MM/AAA)</p>
        </label>
    <input name=\"fecha_nacimiento\" id=\"fecha_nacimiento\" class=\"fecha_nacimiento\" type=\"text\" placeholder=\"DD/MM/AA\" /><br></li>
    <li><label id=\"institucion\" class=\"institucion\" >Institución Educativa</label>
    <input name=\"institucion\" class=\"institucion\" id=\"institucion\" type=\"text\"  placeholder=\"Universidad Nacional de Colombia\" /></li><br>
    <li><label id=\"nivel\" class=\"nivel\" >Nivel Educativo</label>
    <select name=\"nivel\" class=\"registro\">
        <option id=\"nodefinido\">No Definido</option>
        <option id=\"basicaprimaria\">Básica Primaria</option>
        <option id=\"basicasecundaria\">Básica Secundaria</option>
        <option id=\"educacionmedia\">Educación Media</option>
        <option id=\"educacionsuperior\">Educación Superior</option>
        <option id=\"carreratecnicaotecnologica\">Carrera Técnica/Tecnológica</option>
        <option id=\"pregrado\">Pregrado</option>
        <option id=\"especializacion\">Especialización</option>
        <option id=\"maestria\">Maestría</option>
        <option id=\"doctorado\">Doctorádo</option>
        <option id=\"posdoctorado\">Posdoctorado</option>
    </select><input type=\"hidden\" id=\"listaNivelEducativo\" value=\"No Definido, Básica Primaria, Básica Secundaria, Educación Media, Educación Superior, Carrera Técnica o Tecnológica, Pregrado, Especialización, Maestría, Doctorádo o Posdoctorado.\" /></li>
    <li><!-- Aqui se agregan las need que estan  en la base de datos-->
        <label id=\"need\" class=\"need\">Tipo de discapacidad</label><select name=\"need\" id='listaNeed' class=\"registro\"></select><input type=\"hidden\" id=\"opcionesNeed\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, 'opcionesNeed'), "html");
        echo "\"/></li>
    <li><label id=\"usuario\" class=\"usuario\">Usuario:</label> 
    <input id=\"user\" name=\"user\" class=\"user\" type=\"text\" placeholder=\"Nombre de Usuario\" required /></li> 
    <li><label id=\"clave\" class=\"clave\">Contraseña:</label> 
    <input id=\"clave\" name=\"clave\" class=\"password\" type=\"password\" placeholder=\"Contraseña\" required /></li>
    <!--li><label id=\"clave\" class=\"clave\">Validar Contraseña:</label> 
    <input id=\"clave\" class=\"voz\" type=\"password\" placeholder=\"Validar Contraseña\" required /></li-->
    <!--li>
    <center><br><label style='color: #080'>";
        // line 69
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label><br></center>
    </li>
    <li><!--label id=\"iniciar\" class=\"iniciar\" hidden>REGISTRAR</label--><!--br>
        <br><input type=\"submit\" id=\"iniciar\" name=\"iniciar\" class=\"ini\" value=\"REGISTRAR\" ></li>
    <li><!--label id=\"atras\" class=\"atras\" hidden>ATRÁS</label--><!--br>
        <input type=\"button\" id=\"atras\" name=\"atras\" class=\"ini\" onClick=\"parent.location='index.php'\" value=\"ATRÁS\" >
    </li-->
</ul>
        <center>
            <label style='color: #080'>";
        // line 78
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label>
        </center>
        <input type=\"submit\" id=\"iniciar\" name=\"iniciar\" class=\"ini\" value=\"REGISTRAR\" >
        <input type=\"button\" id=\"atras\" name=\"atras\" class=\"ini\" onClick=\"parent.location='index.php'\" value=\"ATRÁS\" >
    </div></form>
<input value='";
        // line 83
        echo twig_escape_filter($this->env, $this->getContext($context, 'need'), "html");
        echo "' type=\"hidden\" id='lista'/>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var lista = \$(\"#lista\").val();
    if (lista.length>0){\$(\"#listaNeed\").html(lista);}
    function limpiarDato(v){
        v = v.replace(/deletrear/g, \"\");
        v = v.replace(/de letrear/g, \"\");
        v = v.replace(/ /g, \"\");
        return v;
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
    var onload = function cargarVoz (){
        var texto=\"\";
        if ('";
        // line 110
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'==\"\"){
            texto = \"Ésta es la página de registro de usuario para la herrmienta GAIATools. Para registrarse pronuncie la palabra seguir, si no diga atrás para regresar a la página inicial, o puedes pronunciar iniciar sesion\"; //agregar instrucciones.
        }else{ 
            texto = '";
        // line 113
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'+\". Recuerda que al decir atrás puedes regresar a la página inicial, o puedes pronunciar iniciar sesion\"; 
        }
        sintetizadorVoz(texto);
    }
   // var valor = localStorage.getItem(\"controlador\");
    //    if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                    'atras':function(){window.location=\"index.php\";},
                    'iniciar sesión':function(){window.location=\"validar.php\";},
                    'seguir' : function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Para realizar el llenado de sus datos, es necesario que pronuncie algunas palabras claves seguidas con su dato, el sistema repetira sus datos y le indicara la siguiente palabra clave, si desea corregir un dato solo debe repetir la palabra clave anterior. Si tiene problemas para que el sistema reconozca alguno de sus datos, solo pronuncie la palabra clave, luego diga deletrear y continúe con la deletreación del dato, pronuncie las letras de forma pausada. Para continuar pronuncie la palabra nombre y mensione su nombre\";
                        sintetizadorVoz(texto);
                    },
                    'nombre *v' : function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"Su nombre es \"+v+\". Para continuar pronuncie la palabra apellido y mensione su apellido\";
                        sintetizadorVoz(texto);
                        \$('.name').val(v);
                    },
                    'apellido *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){
                            v = limpiarDato(v);
                        }
                        var texto = \"Su apellido es \"+v+\". Para continuar pronuncie la palabra correo y mensione su correo electrónico\";
                        sintetizadorVoz(texto);
                        \$('.surname').val(v);
                    },
                    'correo *v' : function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){ v = limpiarDato(v); }
                        v = v.replace(\"arroba\",\"@\");
                        v = v.replace(/ /g, \"\");
                        v = normalize(v);
                        var texto = \"Su correo electrónico es \"+v+\". Para continuar pronuncie su genero sexual pronunciando la palabra femenino o masculino.\";
                        sintetizadorVoz(texto);
                        \$('.email').val(v); 
                    },
                    'femenino': function(){
                        jQuery(\"#femenino\").attr('checked', true);
                        var texto = \"Su genero sexual es femenino. Para continuar con su fecha de nacimiento pronuncie la palabra dia seguido del dia en que nació.\";
                        sintetizadorVoz(texto);
                    },
                    'masculino': function(){
                        jQuery(\"#masculino\").attr('checked', true);
                        var texto = \"Su genero sexual es masculino. Para continuar con su fecha de nacimiento pronuncie la palabra dia seguido del dia en que nació.\";
                        sintetizadorVoz(texto);
                    },
                    'día *v':function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
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
                        var texto = \"Su año de nacimiento fue \"+v+\". Continúe con la institución de la que usted hace parte, pronuncie la palabra institución seguido del nombre completo de esta.\";
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
                        var texto = \"Su institución es \"+v+\". Para continuar mensione nivel educativo y le serán leídas las opciones. Luego pronuncie las palabras seleccionar nivel seguido de la opción. \";
                        sintetizadorVoz(texto);
                        \$('.institucion').val(v);
                    },
                    'nivel educativo':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los niveles educativos válidos son: \"+\$(\"#listaNivelEducativo\").val()+\" Recuerda pronunciar seleccionar nivel seguido del nombre completo de la opción.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar nivel *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"usted a elegido el nivel educativo \"+v+\" Para continuar mensione tipo de discapacidad y le serán leídas las opciones. Luego pronuncie las palabras seleccionar discapacidad seguido de la opción.\";
                        sintetizadorVoz(texto);
                        var vi = \"#\"+normalize(v);
                        jQuery(vi).attr('selected', 'selected');
                    },
                    'tipo de discapacidad':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Los tipos de discapacidad válidos son: \"+\$(\"#opcionesNeed\").val()+\" Recuerda pronunciar seleccionar necesidad seguido del nombre completo de la opción.\";
                        sintetizadorVoz(texto);
                    },
                    'seleccionar necesidad *v':function(v){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Usted a elegido la \"+v+\" Para continuar mensione usuario y mensione su nombre de usuario para este sistema.\";
                        sintetizadorVoz(texto);
                        var vi = \"#\"+normalize(v);
                        jQuery(vi).attr('selected', 'selected');
                    },
                    'usuario *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){v = limpiarDato(v);}
                        var texto = \"Su nombre de usuario es \"+v+\". Para continuar pronuncie la palabra contraseña y mensione contraseña de seguridad\";
                        sintetizadorVoz(texto);
                        \$('.user').val(v);
                    },
                    'contraseña *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        if(/deletrear/.test(v) || /de letrear/.test(v) ){v = limpiarDato(v);}
                        var texto = \"Su contraseña es \"+v+\". Para continuar para finalizar pronuncie la palabra registrarse\";
                        sintetizadorVoz(texto);
                        \$('.password').val(v);
                    },
                    'registrarse':function(){
                        document.forms['registro'].submit();  
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
        return "registro.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
