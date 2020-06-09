<?php

/* pregCerradaMultiple.twig.html */
class __TwigTemplate_0799cd142e9c00471f206469d1ef902b extends Twig_Template
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
</div>
<script type=\"text/javascript\">
    var opciones = new Array();
    function agregarOpcion(opcion){
        var salto = document.createElement('br');
        var inputCheck = document.createElement('input');
        inputCheck.setAttribute('type', 'checkbox'); 
        inputCheck.setAttribute('class', 'multiplesopc'); 
        inputCheck.setAttribute('name', opcion);  
        var container = document.getElementById(\"opcionesmultiples\");
        container.appendChild(inputCheck);
        var nombre = document.createTextNode(opcion);
        container.appendChild(nombre); 
        container.appendChild(salto); 
        \$(\"#opcione\").val(\"\");
        opciones.push(opcion);
    }
    function cadenaOpciones(){
        return opciones.toString();
    }
    /*function removerOpcion(){
        var name=\"\";
        \$(\"input:checkbox:checked\").each(   
            function() {
                name = parseInt(this.id);
                alert(name);
            }
        );
        if(name===\"\"){
            alert(\"Ninguna opción ha sido seleccionada.\");
        }else{
            alert(typeof(name));
            var container = document.getElementById(\"opcionesmultiples\");
            container.removeChild(container.childNodes[name]);
            name = name+1;
            container.removeChild(container.childNodes[name]);
            container.removeChild(container.childNodes[name+2]);
            opciones borrar el elemento del array deleite array[0];
        }
    }*/
    function guardarTemp(urlAplicacion){
        var datos ='";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, 'tmp'), "html");
        echo "';
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"datos\" value=\"'+datos+'\"></input>\\n\\
                               </form>');
        document.forms['cambapli'].submit();
    }
</script>
<div class=\"presentacion\">
    <header><h2>QUESTION -pregunta cerrada míltiple respuesta- para: \"";
        // line 53
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    <div id=\"tipopreg\">
        <button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregAbierta.php');\">Pregunta Abierta</button>
        <button id=\"cerradanmultiple\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaMultiple.php');\">Pregunta Cerrada de Múltiple Respuesta</button>
        <button id=\"cerradaunica\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('');\">Pregunta Cerrada de Única Respuesta</button>
        <button id=\"vf\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('');\">Pregunta de Verdadero o Falso</button>
    </div>
    <div id=\"pregCerradaMultiple\">
        <header><h2>PREGUNTA CERRADA DE MÚLTIPLE RESPUESTA</h2></header>
        <form action=\"pregCerradaMultiple.php\" method=\"get\">
            <p class=\"preg\">
            <input type=\"hidden\" id=\"datos\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, 'tmp'), "html");
        echo "\">
            <label>Pregunta:</label><textarea class=\"textarea1\" name=\"pregunta\"  placeholder=\"¡Escriba aca su pregunta!\"></textarea>
            <input name=\"opciones\" type=\"hidden\" value=\"cadenaOpciones();\">
            <label>Opción:</label><input type='text' id=\"opcione\" value=''>
            <input class=\"btn\" type=\"button\" onClick=\"agregarOpcion(\$('#opcione').val());\" value=\"Inserta Opción\">
            <div id=\"opcionesmultiples\"></div>
            <!--input class=\"btn\" type=\"button\" onclick=\"removerOpcion();\" value=\"Borra Optión\"-->
            <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"GUARDAR\">
            </p>
        </form>
    </div>
    <a  href=\"crearRecurso.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
</div>
";
    }

    public function getTemplateName()
    {
        return "pregCerradaMultiple.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
