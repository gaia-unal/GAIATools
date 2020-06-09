<?php

/* index.twig.html */
class __TwigTemplate_9b15d18f8a391273241facbaeb35a7f8 extends Twig_Template
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
        echo "<aside id=\"sidebar\"><br>
    <h2>Áreas de Conocimiento</h2>
    <br><p id='areas'></p>
    <footer id=\"pie\">GAIA - Grupo de Ambientes Inteligentes Adaptativos</footer>
</aside>
<div class=\"presentacion\">
    <div>
        <h1  class=\"bienvenida\" autofocus> 
        Bienvenido a GAIATools la herramienta de autor inclusiva. Esta es la página principal, 
        donde podra acceder a diversos recursos educativos.  <br>
        Si quiere construir objetos educativos y no esta registrado por favor continúe con el
        enlace \"registrar\", ubicado en el encabezado de la página, para iniciar el proceso. <br>
        Si ya esta registrado, continúe con el enlace \"iniciar sesión\", que 
        también se encuentra en el encabezado de la página.  <br>
        Pero si lo que desea es ejecutar o hacer uso de alguno de los recursos educativos de 
        esta herramienta, haga clic en el recurso que desea ver de la lista del siguiente bloque, 
        o a través del menú ubicado al lado izquierdo de la página, podrá simplificar búsquedas 
        de recursos según el área de conocimiento del que deseas aprender.<br><br></h1>
    </div>
    <p id=\"recursos\"></p>
</div> 
<input value='";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, 'areas'), "html");
        echo "' type=\"hidden\" id='lista'/>
  <script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
  <script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>
<script type=\"text/javascript\">
    var lista = \$(\"#lista\").val();
    if (lista.length>0){ \$(\"#areas\").html(lista); }
    var datos = {idArea : 'todas'};
    \$.post(\"../ajax/index-ajax.php\", datos, function(data) { \$(\"#recursos\").html(data); });
    var onload = function cargarRE (){
        var texto = \"Bienvenido a GAIATools la herramienta de autor inclusiva. Esta es la página principal, donde podras acceder a diversos recursos educativos. Si quieres construir objetos educativos y no estasregistrado porfavor pronuncia la palabra registar para iniciar el proceso. Si ya estas registrado pronuncia iniciar sesión. Pero si desea ejecutar alguno de sus recursos pronuncie seguir para listar los objetos existentes, o tambien puede mensionar la palabra área y le listaremos las areas de conocimiento existentes.\"; 
        //agregar instrucciones.
        sintetizadorVoz(texto);
    }
    function listarSubAreas(){
        var texto = \"Recuerde que al pronunciar la palabra seguir usted podra escuchar la lista de recursos educativos pertenecientes a esta categoria elegida. Pero tambien puede elegir una de las sub categorias al pronunciar seleccionar categoria segido del título completo, para ello le mensionare a continuación todas las sub areas de conocimiento con recursos educativos: \";
        sintetizadorVoz(texto);
        timer = setTimeout(\"sintetizadorVoz(\$('#paraSintetizadorSubAreas').val());\", 20000);
    }
    function consultarOA(variable){
        var datos = {idArea : variable};
        \$.post(\"../ajax/index-ajax.php\", datos, function(data) {\$(\"#recursos\").html(data); });
        if(!isNaN(variable)){
            \$.post(\"../ajax/indexSubAreas-ajax.php\", datos, function(data) { \$(\"#areas\").html(data); });
        }
    }
    //var valor = localStorage.getItem(\"controlador\");
    //    if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las paginas
                    'iniciar sesión':function(){window.location=\"validar.php\";},
                    'registrar':function(){window.location=\"registro.php\";},
                    'seguir' :function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var titulos = \$('#paraSintetizador').val();
                        if(titulos===\"\"){
                            var texto = \"No hay recursos educativos disponible en esta sub area de conocimiento\";
                        }else{
                            var texto = \"Usted debe pronunciar la palabra seleccionar recurso seguido del titulo completo del recurso educativo que desea ver, para ello le mencionaremos todos los titulos de los recursos educativos existentes, \"+titulos;
                        }
                        sintetizadorVoz(texto);
                    },
                    'seleccionar recurso *v':function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        v = \".\"+normalize(v);
                        window.location = \$(v).attr('href');
                    },
                    'área':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var titulos = \$('#paraSintetizadorAreas').val();
                        var texto = \"Las areas de conocimiento disponibles estan utilizando el catálogo de los Núcleos Básicos de Conocimiento NBC, para elegir un área de conocimiento específico prununcie seleccionar área seguido del número correspondiente a la identificación del área de conocimiento, para ello le mencionaremos todos los códigos con el título del área de conocimiento existentes con recursos educativos, \"+titulos;
                        sintetizadorVoz(texto);

                    },
                    'seleccionar área *v':function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var vi = \".\"+normalize(v);
                        if(\$(vi).val()!=null){
                            var valor=\$(vi).val();
                            consultarOA(valor);
                            listarSubAreas();
                        }else{
                            v = \$(v).html();
                            var texto = \"El area de conocimiento \"+v+\" no fue encontrado. Verifique los nombres pronunciando nuevamente seguir\";
                            sintetizadorVoz(texto);
                        }
                    },
                    'seleccionar categoría *v':function(v){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var vi = \".B\"+normalize(v);
                        if(\$(vi).val()!=null){
                            var valor=\$(vi).val();
                            consultarOA(valor);
                            var texto = \"Recuerde que al pronunciar seguir, el sistema podra listarle los nombres de los recursos educativos visibles.\";
                            sintetizadorVoz(texto);
                        }else{
                            var texto = \"El area de conocimiento \"+v+\" no fue encontrado. Verifique los nombres pronunciando categoria\";
                            sintetizadorVoz(texto);
                        }
                    },
                    'categoría':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var titulos = \$('#paraSintetizadorSubAreas').val();
                        var texto = \"Recuerde que debe pronunciar seleccionar subcategoría seguido del titulo completo, para ello las sub areas de conocimiento disponibles son: \"+titulos;
                        sintetizadorVoz(texto);
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
                \$(document).ready(function() { \$('#unsupported').fadeIn('fast'); });
            }
        //}
</script>
";
    }

    public function getTemplateName()
    {
        return "index.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
