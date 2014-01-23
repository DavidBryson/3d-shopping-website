require.config({
    paths: {
        jquery: 'http://code.jquery.com/jquery-2.0.3.min',
        three: 'lib/three'
    },
    shim: {
        three: {
            exports: 'THREE'
        }
    }
});
require(['src/loadItems'], function(loadItems) {
	loadItems(9);
})