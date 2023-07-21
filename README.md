# WP Components Test

> Is it possible to use the amazing [wp.components](https://developer.wordpress.org/block-editor/reference-guides/components/) in non-react WordPress plugins?

This repository contains a plugin with a couple of tests to explore the possibilities of using the WordPress React components library outside of a React context. Inside [functions.php](/blob/main/functions.php) there is a constant that may be used to switch test:

```php
const TEST_WITH = 'JS' // or 'VUE'
```

The existing results are possible due to the [wp.element](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-element/) package, which acts as a wrapper for React [createElement](https://reactjs.org/docs/react-api.html#createelement), a limited but useful alterative to JSX.
