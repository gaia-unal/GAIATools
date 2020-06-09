<?php

/* libro2.twig.html */
class __TwigTemplate_3028c35aa1ee6b4d03c171cf2956acaf extends Twig_Template
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

    // line 3
    public function block_inner($context, array $blocks = array())
    {
        // line 4
        echo "
<!-- librerias necesarias para el aspecto y funcionamiento de la aplicacion libro -->
<div class=\"libro\">
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
<meta name=\"description\" content=\"\" />
<meta name=\"keywords\" content=\"\" />
<meta name=\"description\" content=\"Moleskine Notebook with jQuery Booklet\" />
<meta name=\"keywords\" content=\"jquery, book, flip, pages, moleskine, booklet, plugin, css3 \"/>
<link href=\"../templates/booklet/jquery.booklet.1.1.0.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\"/>
<link rel=\"stylesheet\" href=\"../templates/css/style.css\" />

<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.4.min.js\"></script>
<script src=\"../templates/booklet/jquery.easing.1.3.js\" type=\"text/javascript\"></script>
<script src=\"../templates/booklet/jquery.booklet.1.1.0.min.js\" type=\"text/javascript\"></script>

<!-- funcion script encargada de convertir el nombre de una etiqueta especifica en un audio que es reproducido al usuario -->
  <script type=\"text/javascript\">
  \$(function(){
    \$('.contenido').focus(function(e){
      e.preventDefault();
      var text = \$('label.'+\$(this).attr(\"id\")).html();
      text = encodeURIComponent(text);
      var url = \"http://text-to-speech-demo.mybluemix.net/api/synthesize?voice=es-ES_EnriqueVoice&text=\" + text;
      \$('audio.speech').attr('src',url).get(0).play();
    });
  });
  </script>

<!-- funcion script encargada de reproducir en un audio el titulo de la pagina con sus respectivas especificaciones -->
  <script type=\"text/javascript\">
  \$(document).ready(function(){
    var url = 'http://text-to-speech-demo.mybluemix.net/api/synthesize?voice=es-ES_EnriqueVoice&text=libro---'+'";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'libro'), "nombre", array(), "any", false), "html");
        echo "';
    \$('audio.speech').attr('src',url).get(0).play();
  });
  </script>

<header class=\"titulo\">
<h2>LIBRO</h2>
<h2>Nombre : ";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'libro'), "nombre", array(), "any", false), "html");
        echo "</h2>
</header>

<div class=\"prim\">
   <div class=\"book_wrapper\">
    <a id=\"next_page_button\"></a>
    <a id=\"prev_page_button\"></a>
    <div id=\"loading\" class=\"loading\">Loading pages...</div>
    <div id=\"mybook\" style=\"display:none;\">
        <div class=\"b-load\" id=\"texto\">
           ";
        // line 52
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'pagina'));
        foreach ($context['_seq'] as $context['_key'] => $context['n']) {
            // line 53
            echo "               <div class=\"pagina\">

                ";
            // line 55
            if (($this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false) != "")) {
                // line 56
                echo "                   <img class=\"image\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false), "html");
                echo "\" alt=\"\" />
                ";
            }
            // line 58
            echo "                    <label class=\"contenido\" hidden='true'></label><br>
                    <a class=\"contenido\" id=\"contenido\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "contenido", array(), "any", false), "html");
            echo "</a>
               </div>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 62
        echo "           
        </div>
    </div>
    </div>
    </div>

<script src=\"/javascripts/application.js\" type=\"text/javascript\" charset=\"utf-8\" async defer>
\$(document).ready(function(){
    var text = \$('label.'+\$(this).attr(\"id\")).html();
    text = encodeURIComponent(text);
    var url = \"http://text-to-speech-demo.mybluemix.net/api/synthesize?voice=es-ES_EnriqueVoice&text=\" + text;
    \$('audio.speech').attr('src',url).get(0).play();
});
</script>

    <script>
        \"use strict\";
        if (annyang) {
            \"use strict\"
            var seguir = function() { 
                \$(\"#contenido\").focus()
            };  
            var commands = {
                'seguir':seguir,
                'usuario *v' : function(v){
                    var nom= document.getElementById('contenido');
                    var url = \"http://text-to-speech-demo.mybluemix.net/synthesize?text=Su usuario es \" + v + \"&voice=es-ES_EnriqueVoice\";
                    \$('audio.speech').attr('src',url).get(0).play();
                    nom.value=v;
                },
                'contraseña *v' : function(v){
                    var nom= document.getElementById('pass');
                    nom.value=v; 
                },
                'iniciar sesión':function(){
                    formu.submit();
                },
                'registrarse':function(){
                    window.location=\"registroU.php\";
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
    </script>

<script type=\"text/javascript\">

    \$(function() {
        var \$mybook         = \$('#mybook');
        var \$bttn_next      = \$('#next_page_button');
        var \$bttn_prev      = \$('#prev_page_button');
        var \$loading        = \$('#loading');
        var \$mybook_images  = \$mybook.find('div.pagina');
        var cnt_images      = \$mybook_images.length;
        var loaded          = 0;
        //preload all the images in the book,
        //and then call the booklet plugin

        \$mybook_images.each(function(){
            var \$img    = \$(this);
            var source  = \$img.attr('src');

                ++loaded;
                if(loaded == cnt_images){
                    \$loading.hide();
                    \$bttn_next.show();
                    \$bttn_prev.show();
                    \$mybook.show().booklet({
                        name:               null,                            // name of the booklet to display in the document title bar
                        width:              800,                             // container width
                        height:             500,                             // container height
                        speed:              600,                             // speed of the transition between pages
                        direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
                        startingPage:       0,                               // index of the first page to be displayed
                        easing:             'easeInOutQuad',                 // easing method for complete transition
                        easeIn:             'easeInQuad',                    // easing method for first half of transition
                        easeOut:            'easeOutQuad',                   // easing method for second half of transition

                        closed:             true,                           // start with the book \"closed\", will add empty pages to beginning and end of book
                        closedFrontTitle:   null,                            // used with \"closed\", \"menu\" and \"pageSelector\", determines title of blank starting page
                        closedFrontChapter: null,                            // used with \"closed\", \"menu\" and \"chapterSelector\", determines chapter name of blank starting page
                        closedBackTitle:    null,                            // used with \"closed\", \"menu\" and \"pageSelector\", determines chapter name of blank ending page
                        closedBackChapter:  null,                            // used with \"closed\", \"menu\" and \"chapterSelector\", determines chapter name of blank ending page
                        covers:             false,                           // used with  \"closed\", makes first and last pages into covers, without page numbers (if enabled)

                        pagePadding:        10,                              // padding for each page wrapper
                        pageNumbers:        true,                            // display page numbers on each page

                        hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
                        overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
                        tabs:               false,                           // adds tabs along the top of the pages
                        tabWidth:           60,                              // set the width of the tabs
                        tabHeight:          20,                              // set the height of the tabs
                        arrows:             false,                           // adds arrows overlayed over the book edges
                        cursor:             'pointer',                       // cursor css setting for side bar areas

                        hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
                        keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
                        next:               \$bttn_next,                     // selector for element to use as click trigger for next page
                        prev:               \$bttn_prev,                     // selector for element to use as click trigger for previous page

                        menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
                        pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
                        chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the \"rel\" attribute, requires 'menu'

                        shadows:            true,                            // display shadows on page animations
                        shadowTopFwdWidth:  166,                             // shadow width for top forward anim
                        shadowTopBackWidth: 166,                             // shadow width for top back anim
                        shadowBtmWidth:     50,                              // shadow width for bottom shadow

                        before:             function(){},                    // callback invoked before each page turn animation
                        after:              function(){}                     // callback invoked after each page turn animation
                    });
                    Cufon.refresh();
                }
        });
    });
 
</script>


</div>
";
    }

    public function getTemplateName()
    {
        return "libro2.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
