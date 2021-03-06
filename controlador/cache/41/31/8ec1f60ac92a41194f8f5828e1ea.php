<?php

/* validar.twig.html */
class __TwigTemplate_41318ec1f60ac92a41194f8f5828e1ea extends Twig_Template
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
        echo "<div class=\"inner\">
    <div>
        <h3 class=\"bienvenida\">
            Ésta es la página para validación de usuario de la herramienta GAIATools.<br>
            Para iniciar su sesión de usuario, digite su nombre de usuario y su contraseña<br>
            en los campos presentados aacontinuación, luego selecciones el botón \"Iniciar Sesión\".<br>
            Si no, a través del botón \"Atrás\" puede regresar a la página principal de la herramienta<br>
            O puede registrar un usuario siguiendo el enlace \"registrar\"<br> 
            ubicado en la parte superior de la página.<br><br>
        </h3>
    </div>
<header><h2>INICIAR SESIÓN</h2></header>
<center>
    <p>    
    <form class=\"sesion\" id=\"form\" method=\"post\" action=\"validar.php\">
        <img src=\"../images/logo_usuario.png\" id=\"logo_usuario\" alt=\"logo usuario\" />
        <label id=\"nombre_validar\" class=\"user\">Usuario</label>
        <input autofocus type=\"text\" id=\"user_validar\" class=\"validar\" name=\"user\" placeholder=\"Nombre de Usuario\"/>
        <label id=\"contraseña_validar\" class=\"pass\">Contraseña</label>
        <input type=\"password\" id=\"pass_validar\" class=\"validar\" name=\"pass\" placeholder=\"Contraseña\"/>
        <br><br><br><label style=\"color: #080\">";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "</label></br>
        <input class=\"btn\" id=\"is\" type=\"submit\" value=\"INICIAR SESIÓN\"/><br><br>
    </form>
    <input id=\"btn-registrar\" class=\"btn\" type=\"button\" onClick=\"parent.location='index.php'\" value=\"ATRÁS\"/>
</p></center>
</div>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    function normalize (str) {
        var from = \"ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;.:-_^¨{}[]*+~¡?¿!#\$%&/()=°!|ºª\";
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
        var texto=\"\";
        if ('";
        // line 47
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'==\"\"){
            texto = \"Ésta es la página para validación de usuario de la herrmienta GAIATools. Para iniciar su sesión pronuncie la palabra seguir, si no diga atrás para regresar a la página inicial, o puedes pronunciar registro si no tienes usuario creado\"; 
        }else{ 
            texto = '";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
        echo "'+\". Recuerda que al decir atrás puedes regresar a la página inicial, o puedes pronunciar registro\"; 
        }
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                    'atras':function(){window.location=\"index.php\";},
                    'registrar':function(){window.location=\"registro.php\";},
                    'seguir' : function(){//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Para realizar la validación de usuario e iniciar su sesion, es necesario que pronuncie la palabra usuario y mensione su nombre de usuario\";
                        sintetizadorVoz(texto);
                    },
                    'usuario *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        v = normalize(v);
                        var texto = \"Su nombre de usuario es \"+v+\". Para continuar pronuncie la palabra contraseña y mensione la clave de seguridad\";
                        sintetizadorVoz(texto);
                        \$('#user_validar').val(v);
                    },
                    'contraseña *v' : function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Su contraseña es \"+v+\". Para continuar para finalizar pronuncie la palabra iniciar sesión\";
                        sintetizadorVoz(texto);
                        \$('#pass_validar').val(v);
                    },
                    'iniciar sesión':function(){
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
";
    }

    public function getTemplateName()
    {
        return "validar.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
