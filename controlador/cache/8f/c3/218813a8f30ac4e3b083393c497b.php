<?php

/* listarRecurso.twig.html */
class __TwigTemplate_8fc3218813a8f30ac4e3b083393c497b extends Twig_Template
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
        echo "<div class=\"presentacion\" >
    <div>
        <h3 class=\"bienvenida\" autofocus>
            Ésta es la \"";
        // line 6
        if (($this->getContext($context, 'ruta') == "verRecurso.php")) {
            echo "visualización";
        } else {
            echo "edición";
        }
        echo "\" de todos los recursos educativos que usted ha logrado construir. 
            Recuerde que puede consultar el menú ubicado al lado izquierdo de la página o
            finalizar la sesión de usuario siguiendo el enlace en la parte superior 
            \"Cerrar Sesión\". Pero si desea ejecutar alguno de sus recursos solo debe
            seleccionar alguno de los que se listan a continuación.<br><br>
        </h3>
    </div>
    <input value='";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, 'idUsuario'), "html");
        echo "' type=\"hidden\" id='lista'/>
    <div id='recursos'></div>
</div>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function cargarRE (){
        \$id = \$(\"#lista\").val();
        var datos = {id : \$id, ruta : \"";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, 'ruta'), "html");
        echo "\" };
        \$.post(\"../ajax/listarRecUsuario-ajax.php\", datos, function(data) {
            \$(\"#recursos\").html(data);
        });
        if('";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, 'ruta'), "html");
        echo "'===\"verRecurso.php\"){
            var ubicacion = \"visualización\";
        }else{
            var ubicacion = \"edición\";
        }
        var texto = \"Esta en la \"+ubicacion+\" de todos los recursos educativos que usted a logrado construir. Recuerde que puede consultar el menú con solo pronunciar la palabra menú o para finalizar la sesión de usuario solo debes pronunciar las palabras cerrar sesión. Pero si desea ejecutar alguno de sus recursos pronuncie seguir para listar los objetos existentes.\"; 
        //agregar instrucciones.
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){            
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra crear, editar o eliminar según la acción que requieras utilizar\"; 
                        sintetizadorVoz(texto);
                    },//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                    'presentación':function(){window.location=\"principal.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'crear':function(){window.location=\"crearRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'seguir' :function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var titulos = \$('#paraSintetizador').val();
                        var texto = \"Usted debe pronunciar la palabra seleccionar seguido del número correspondiente al recurso educativo que desea ver, para ello le mencionaremos todos los codigos con los titulos de los recursos educativos existentes, \"+titulos;
                        sintetizadorVoz(texto);
                    },
                    'seleccionar *v':function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        if (v===\"uno\"){ v=\"1\"; }
                        var vi = \".\"+normalize(v);
                        if(\$(vi).attr('href')!=null){
                            window.location = \$(vi).attr('href');
                        }else{
                            var texto = \"El recurso educativo \"+v+\" no fue encontrado. Verifique los nombres pronunciando nuevamente seguir\";
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
        return "listarRecurso.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
