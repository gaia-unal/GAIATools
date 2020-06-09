<?php

/* askNow.twig.html */
class __TwigTemplate_b4bab423bdc62bef0e2ebffabcdadc22 extends Twig_Template
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

    // line 4
    public function block_inner($context, array $blocks = array())
    {
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, 'nombre'), "html");
        echo "
\t
\t\t\t<form class=\"sesion\" id=\"askNow\" action=\"askNow.php\" method=\"post\">
\t\t\t\t<p class=\"preg\">

\t\t\t\t\tpregunta:<br><br> 
\t\t\t\t\t<textarea class=\"textarea1\" name=\"pregunta\"  placeholder=\"¡Escriba aca su pregunta!\"></textarea><br><br>
\t\t\t\t\topción:<br><br>
\t\t\t\t\t<input type='text' id=\"opcione\" value=''> <br><br>
\t\t\t\t\tRESPUESTA: <select id=\"respuesta\" name=\"respuesta\" ></select><br><br>
\t\t\t\t\t<input class=\"btn\" type='button' id=\"agregaropcion\" onclick='javascript:insertOption(elements[1].value)' value='Inserta Opción'> <br><br>
\t\t\t\t\t<input class=\"btn\" type='button' onclick='javascript:removeOption()' value='Borra Optión'> <br><br>

\t\t\t\t\t<input type=\"text\" id=\"respuestas1\" name=\"respuestas1\" hidden>

\t\t\t\t\t
\t\t\t\t\t<input class=\"btn\" type=\"submit\" name=\"guardar\" id=\"guardar\" value=\"GUARDAR\"><br><br>
\t\t\t\t</p>
\t\t\t</form>

\t\t\t<script>
\t\t\t\t\$('#agregaropcion').click(function(){
\t\t\t\t\tvar valu = \$(\"#respuestas1\").val();
\t\t\t\t\tif(valu==\"\"){
\t\t\t\t\t\t\$(\"#respuestas1\").val(\$('#opcione').val()),
\t\t\t\t\t\t\$(\"#opcione\").val('');
\t\t\t\t\t}else{
\t\t\t\t\t\t\$(\"#respuestas1\").val(valu+','+\$('#opcione').val()),
\t\t\t\t\t\t\$(\"#opcione\").val('');
\t\t\t\t\t}
\t\t\t\t\t
\t\t\t\t});
\t\t\t</script>
\t\t\t
\t\t\t<a  href=\"registroAskNow.php\"><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>

<script type=\"text/javascript\">
/**
 * [myFunction description] funcion encargada de mostrar las opciones disponibles
 * @param  {[type]} val [description]
 * @return {[type]}     [description]
 */
 function myFunction(val) {
 \t\$('#respuesta').append('<option value='+val+' selected=\"selected\">'+val+'</option>');
 }

/**
 * [confirmClick description] funcion encargada de finalizar la sesion
 * @return {[type]} [description]
 */
 function confirmClick() {
 \tif(confirm(\"desea cerrar sesión?\")) {
 \t\treturn true;
 \t} else {
 \t\treturn false;
 \t}
 };

</script>

<script type=\"text/javascript\"> 
\t<!-- 
\tfunction insertOption(elm) 
\t{ 

\t\tvar nuevaOpcion=document.createElement('option'); 
\t\tnuevaOpcion.text=elm; 

\t\tvar selectRespuesta=document.getElementById(\"respuesta\"); 

\t\ttry 
\t\t{ 

selectRespuesta.add(nuevaOpcion,null); // standards compliant 
var respuestas1 = document.getElementById(\"respuesta1\");

} 
catch(ex) 
{ 

selectRespuesta.add(nuevaOpcion); // IE only 
} 
} 

function removeOption() 
{ 
\tvar selectRespuesta=document.getElementById(\"respuesta\"); 
\tselectRespuesta.remove(selectRespuesta.selectedIndex); 
} 
//--> 
</script> 


";
    }

    public function getTemplateName()
    {
        return "askNow.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
