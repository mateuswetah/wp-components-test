<template>
  <div ref="el">
  </div>
  <div>
    <button class="components-button is-primary" @click="updateCount">
      Hello from Vue {{ count }}
    </button>
  </div>
</template>

<script>
const { createRoot, render, createElement } = wp.element;
const { Button } = wp.components;

function MyButton( props ) {
  return createElement( 
      Button,
      {
          onClick: props.updateCallback,
          variant: 'primary'
      },
      'Hello from React ' + props.countCallback
  );
}

export default {
  data() {
    return {
      count: 0,
      domElelement: null,
      uiElement: null
    }
  },
  mounted() {
    this.domElement = this.$refs.el;
    this.renderReact();
  },
  methods: {
    updateCount() {
      this.count++;
    },
    renderReact() {
      this.uiElement = createElement( MyButton, { countCallback: this.count , updateCallback: this.updateCount } );

      if ( createRoot )
          createRoot( this.domElement ).render( this.uiElement );
      else
          render( this.uiElement, this.domElement );
    }
  },
  updated() {
    this.renderReact();
  }
}

</script>