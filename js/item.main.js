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
require(['src/loadItem', 'src/itemHas3D'], function(loadItem, itemHas3D) {
	loadItem(1);
    itemHas3D(1);
})