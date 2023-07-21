// Conteúdo do arquivo "wp-components-test.js"
document.addEventListener('DOMContentLoaded', function () {
    // Seu código JavaScript personalizado pode ser adicionado aqui.
    console.log('O arquivo JavaScript personalizado foi carregado com sucesso!');
    console.log(wp.components)

    
    const { createRoot, render, createElement } = wp.element;
    const { Button } = wp.components;

    function MyButton( props ) {
        return createElement( 
            Button,
            {
                onClick: () => alert( 'Hello World!' ),
                variant: 'primary'
            },
            'Hello ' + props.toWhom + '!'
        );
    }

    const domElement = document.getElementById( 'app' );
    const uiElement = createElement( MyButton, { toWhom: 'World' } );

    if ( createRoot ) {
        createRoot( domElement ).render( uiElement );
    } else {
        render( uiElement, domElement );
    }

});
  