// Script should execute only after dom is loaded. We are using here DOMContentLoaded event.
document.addEventListener('DOMContentLoaded', function () {
    
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
  