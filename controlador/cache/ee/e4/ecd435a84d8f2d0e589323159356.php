<?php

/* principal.twig.html */
class __TwigTemplate_eee4ecd435a84d8f2d0e589323159356 extends Twig_Template
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
    <h1 class=\"bienvenida\" autofocus>
    Bienvenido a la Herramienta de Autor desarrollada por el grupo de 
    investigación GAIA de la Universidad Nacional de Colombia con financiación 
    de Colciencias y el Ministerio de Educación.<br><br>
    Por medio de esta herramienta podrá construir diversos recursos educativos
    enfocados a una visualización para personas con necesidades especiales de 
    educación.
    </h1>
    <h2 style=\"color: #982c2c; line-height: normal; text-transform: none; letter-spacing: normal; margin-top: 2em; margin-bottom: 2em; display: inline-block\">
        Advertencia, los objetos educativos creados bajo esta suit de herramientas se crearán bajo 
        la licencialicencia Atribución – No comercial <br>
        <img alt=\"Logotipo de la licencias creative commons\" style=\"width: 5em;\" src=\"../images/licencia.png\"/>
    </h2>
</div>

<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function cargarRE (){
        var texto = \"Bienvenido \"+'";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "'+\" a la Herramienta de Autor desarrollada por el grupo de investigación GAIA de la Universidad Nacional de Colombia con financiación de Colciencias y el Ministerio de Educación. Por medio de esta herramienta podras construir diversos recursos educativos enfocados a una visualización para personas con necesidades especiales de educación. Si quieres consultar el menú, por favor pronuncia la palabra menú y para finalizar la sesión de usuario solo debes pronunciar las palabras cerrar sesión\"; 
        //agregar instrucciones.
        sintetizadorVoz(texto);
    }
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar operaciones sobre los recursos educativos, solo debes mencionar la palabra visualizar, crear, editar o eliminar según la acción que requieras utilizar\"; 
                        sintetizadorVoz(texto);
                    },//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'crear':function(){window.location=\"crearRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";}
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
        return "principal.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
